<?php

return [
    'plugin' => [
        'name' => 'Blog plugin',
        'description' => 'A simple blog plugin',
        'navigation' => [
            'new_post' => 'New post',
            'blog' => 'Blog',
            'categories' => 'Categories',
            'posts' => 'Posts',
            'tags' => 'Tags'
        ],
    ],
    'settings' => [
        'name' => 'Blog',
        'blog_name' => 'Blog name',
        'blog_description' => 'Blog description',
        'poster' => 'Poster',
        'blog_name_color' => 'Blog name color',
        'description_color' => 'Description color',
        'menu_color' => 'Menu color',
        'menu_color_hover' => 'Menu color (hover)',
        'menu_color_active' => 'Menu color (active)',
        'main_page_meta_title' => 'Main page title',
        'main_page_meta_description' => 'Main page meta description',
        'tabs' => [
            'general' => 'General',
            'colors' => 'Colors',
            'seo' => 'Seo'
        ]
    ],
    'models' => [
        'category' => [
            'columns' => [
                'id' => 'id',
                'name' => 'Name',
                'count' => 'Posts',
            ],
            'fields' => [
                'name' => 'Name',
                'slug' => 'Slug',
            ],
        ],
        'post' => [
            'columns' => [
                'id' => 'ID',
                'category' => 'Category',
                'name' => 'Name',
                'active' => 'Active'
            ],
            'fields' => [
                'category' => 'Category',
                'name' => 'Name',
                'slug' => 'Slug',
                'type' => 'Type',
                'image' => 'Image',
                'small_text' => 'Description',
                'text' => 'Text',
                'tags' => 'Tags',
                'general' => 'General',
                'blocks' => 'Blocks'
            ],
        ],
        'posttag' => [
            'columns' => [
                'tag' => 'Tag',
            ],
            'fields' => [
                'tag' => 'Tag',
            ],
        ],
        'tag' => [
            'columns' => [
                'id' => 'ID',
                'name' => 'Name',
            ],
            'fields' => [
                'name' => 'Name',
                'slug' => 'Slug',
            ],
        ],
        'general' => [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ],
    ],
    'controllers' => [
        'common' => [
            'create' => 'Create',
            'update' => 'Update',
            'delete_selected' => 'Delete selected',
            'delete' => 'Delete',
            'delete_confirm' => 'Are your sure?',
            'deleting' => 'Deleting...',
        ],
        'categories' => [
            'name' => 'Categories',
        ],
        'posts' => [
            'name' => 'Posts',
            'tags' => 'Tags',
            'blocks' => 'Blocks'
        ],
        'tags' => [
            'name' => 'Tags',
        ],
    ],
    'components' => [
        'tag_view' => [
            'name' => 'View tag',
            'slug' => 'Slug'
        ],
        'post_view' => [
            'name' => 'View post',
            'slug' => 'Slug'
        ],
        'posts_list' => [
            'name' => 'Posts',
            'category_slug' => 'Category slug',
            'limit' => 'Limit'
        ],
        'categories_list' => [
            'name' => 'Categories'
        ]
    ]
];
