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
            'name'        => 'dimsog.blog::lang.plugin.name',
            'description' => 'dimsog.blog::lang.plugin.description',
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
    public function registerNavigation()
    {
        return [
            'blog' => [
                'label'       => 'dimsog.blog::lang.plugin.navigation.blog',
                'url'         => Backend::url('dimsog/blog/posts'),
                'icon'        => 'icon-file-text-o',
                'permissions' => ['*'],
                'order'       => 500,
                'sideMenu' => [
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
            ],
        ];
    }
}
