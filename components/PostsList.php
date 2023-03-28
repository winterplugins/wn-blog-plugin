<?php

declare(strict_types=1);

namespace Dimsog\Blog\Components;

use Cms\Classes\ComponentBase;
use Dimsog\Blog\Classes\PostsReader;
use Dimsog\Blog\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PostsList extends ComponentBase
{
    private ?Category $category;

    private LengthAwarePaginator $posts;


    public function componentDetails(): array
    {
        return [
            'name'        => 'dimsog.blog::lang.components.posts_list.name',
            'description' => ''
        ];
    }

    public function onRun()
    {
        $reader = new PostsReader((int)$this->property('limit'));
        $slug = $this->property('categorySlug');
        $this->category = Category::findBySlug($slug);
        if (empty($slug) == false && $this->category == null) {
            return $this->controller->run('404');
        }
        $reader->setCategoryId((int) $this->category?->id);
        $this->posts = $reader->read();

        if (empty($this->category) == false) {
            $this->page->title = $this->category->name;
        }
        $this->page['activeCategory'] = $this->category;
    }

    public function onRender(): void
    {
        $this->page['category'] = $this->category;
        $this->page['items'] = $this->posts;
    }

    public function defineProperties(): array
    {
        return [
            'categorySlug' => [
                'title' => 'dimsog.blog::lang.components.posts_list.category_slug',
                'description' => '',
                'default' => null,
                'type' => 'string'
            ],
            'limit' => [
                'title' => 'dimsog.blog::lang.components.posts_list.limit',
                'default' => 20
            ]
        ];
    }
}
