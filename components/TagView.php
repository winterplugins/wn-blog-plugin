<?php

declare(strict_types=1);

namespace Dimsog\Blog\Components;

use Cms\Classes\ComponentBase;
use Dimsog\Blog\Classes\PostsReader;
use Dimsog\Blog\Models\Tag;
use Illuminate\Pagination\LengthAwarePaginator;

class TagView extends ComponentBase
{
    private Tag $tag;

    private LengthAwarePaginator $posts;


    public function onRun()
    {
        $tag = Tag::findBySlug($this->property('slug'));
        if (empty($tag)) {
            return $this->controller->run('404');
        }
        $reader = (new PostsReader())
            ->setTagId($tag->id);

        $this->tag = $tag;
        $this->posts = $reader->read();
        $this->page->title = $tag->name;
    }

    public function onRender()
    {
        $this->page['tag'] = $this->tag;
        $this->page['items'] = $this->posts;
    }

    public function componentDetails(): array
    {
        return [
            'name'        => 'dimsog.blog::lang.components.tag_view.name',
            'description' => ''
        ];
    }

    public function defineProperties(): array
    {
        return [
            'slug' => [
                'title' => 'dimsog.blog::lang.components.tag_view.slug',
                'description' => '',
                'default' => null,
                'type' => 'string'
            ],
        ];
    }
}
