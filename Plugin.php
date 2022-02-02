<?php namespace Dimsog\Blog;

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
    public function pluginDetails()
    {
        return [
            'name'        => 'Blog',
            'description' => 'No description provided yet...',
            'author'      => 'Dimsog',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

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

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'dimsog.blog.some_permission' => [
                'tab' => 'Blog',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'blog' => [
                'label'       => 'Блог',
                'url'         => Backend::url('dimsog/blog/posts'),
                'icon'        => 'icon-file-text-o',
                'permissions' => ['*'],
                'order'       => 500,
                'sideMenu' => [
                    'categories' => [
                        'label'       => 'Категории',
                        'url'         => Backend::url('dimsog/blog/categories'),
                        'icon'        => 'icon-list-ul',
                        'permissions' => ['*'],
                        'order'       => 500
                    ],
                    'posts' => [
                        'label'       => 'Блог',
                        'url'         => Backend::url('dimsog/blog/posts'),
                        'icon'        => 'icon-file-text-o',
                        'permissions' => ['*'],
                        'order'       => 500
                    ],
                    'tags' => [
                        'label'       => 'Теги',
                        'url'         => Backend::url('dimsog/blog/tags'),
                        'icon'        => 'icon-link',
                        'permissions' => ['*'],
                        'order'       => 500
                    ],
                    'posttypes' => [
                        'label'       => 'Типы постов',
                        'url'         => Backend::url('dimsog/blog/posttypes'),
                        'icon'        => 'icon-list-ul',
                        'permissions' => ['*'],
                        'order'       => 500
                    ]
                ]
            ],
        ];
    }
}
