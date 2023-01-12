<?php

declare(strict_types=1);

namespace Dimsog\Blog\Components;

use Cms\Classes\ComponentBase;
use Dimsog\Blog\Models\Post;

class PostView extends ComponentBase
{
    private ?Post $post;


    public function onRun()
    {
        $this->post = Post::findActiveBySlug($this->property('slug'));
        if ($this->post == null) {
            return $this->controller->run('404');
        }
        $this->post->updateViews();
        $this->page->title = $this->post->name;
        $this->page['activeCategory'] = $this->post->category;
    }

    public function onRender(): void
    {
        $this->page['post'] = $this->post;
    }

    public function componentDetails(): array
    {
        return [
            'name'        => 'dimsog.blog::lang.components.post_view.name',
            'description' => ''
        ];
    }

    public function defineProperties()
    {
        return [
            'slug' => [
                'title' => 'dimsog.blog::lang.components.post_view.slug',
                'description' => '',
                'default' => null,
                'type' => 'string'
            ],
        ];
    }
}
