<?php

declare(strict_types=1);

namespace Dimsog\Blog;

use Backend;
use Dimsog\Blog\Components\CategoriesList;
use Dimsog\Blog\Components\PostsList;
use Dimsog\Blog\Components\PostView;
use Dimsog\Blog\Components\TagView;
use System\Classes\PluginBase;

/**
 * Blog Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'dimsog.blog::lang.plugin.name',
            'description' => 'dimsog.blog::lang.plugin.description',
            'author'      => 'Dimsog',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerComponents(): array
    {
        return [
            CategoriesList::class => 'categoriesList',
            PostsList::class => 'postsList',
            PostView::class => 'postView',
            TagView::class => 'tagView'
        ];
    }

    public function registerMarkupTags(): array
    {
        return [
            'filters' => [
                'preparePost' => function (?string $value): string {
                    return preg_replace(
                        '/(\<p\>\<img src="(.+)"(.*)\>\<\/p>)/',
                        '<div class="post-view__image"><img src="$2"></div>',
                        $value
                    );
                }
            ]
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation(): array
    {
        return [
            'blog' => [
                'label'       => 'dimsog.blog::lang.plugin.navigation.blog',
                'url'         => Backend::url('dimsog/blog/posts'),
                'icon'        => 'icon-file-text-o',
                'permissions' => ['*'],
                'order'       => 500,
                'sideMenu' => [
                    'new_post' => [
                        'label'       => 'dimsog.blog::lang.plugin.navigation.new_post',
                        'url'         => Backend::url('dimsog/blog/posts/create'),
                        'icon'        => ' icon-plus',
                        'permissions' => ['*'],
                        'order'       => 500
                    ],
                    'posts' => [
                        'label'       => 'dimsog.blog::lang.plugin.navigation.posts',
                        'url'         => Backend::url('dimsog/blog/posts'),
                        'icon'        => 'icon-file-text-o',
                        'permissions' => ['*'],
                        'order'       => 500
                    ],
                    'categories' => [
                        'label'       => 'dimsog.blog::lang.plugin.navigation.categories',
                        'url'         => Backend::url('dimsog/blog/categories'),
                        'icon'        => 'icon-list-ul',
                        'permissions' => ['*'],
                        'order'       => 500
                    ],
                    'tags' => [
                        'label'       => 'dimsog.blog::lang.plugin.navigation.tags',
                        'url'         => Backend::url('dimsog/blog/tags'),
                        'icon'        => 'icon-link',
                        'permissions' => ['*'],
                        'order'       => 500
                    ],
                    'posttypes' => [
                        'label'       => 'dimsog.blog::lang.plugin.navigation.posttypes',
                        'url'         => Backend::url('dimsog/blog/posttypes'),
                        'icon'        => 'icon-list-ul',
                        'permissions' => ['*'],
                        'order'       => 500
                    ]
                ]
            ]
        ];
    }
}
