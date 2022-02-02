<?php namespace Dimsog\Blog\Components;

use Cms\Classes\ComponentBase;
use Dimsog\Blog\Classes\PostsReader;
use Dimsog\Blog\Models\Category;
use Dimsog\Blog\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostsList extends ComponentBase
{
    private ?Category $category;

    private Collection $posts;


    public function componentDetails(): array
    {
        return [
            'name'        => 'Список записей',
            'description' => ''
        ];
    }

    public function onRun()
    {
        $reader = new PostsReader();
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
                'title' => 'URL категории',
                'description' => 'Укажите категорию, из которой брать записи',
                'default' => null,
                'type' => 'string'
            ],
        ];
    }
}
