<?php

return [
    'plugin' => [
        'name' => 'Blog plugin',
        'description' => 'A simple blog plugin',
        'navigation' => [
            'blog' => 'Blog',
            'categories' => 'Categories',
            'posts' => 'Posts',
            'tags' => 'Tags',
            'posttypes' => 'Post types',
        ],
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
            ],
            'fields' => [
                'category' => 'Category',
                'name' => 'Name',
                'slug' => 'Slug',
                'type' => 'Post type',
                'active' => 'Active',
                'image' => 'Image',
                'small_text' => 'Small text',
                'text' => 'Text',
                'tags' => 'Tags',
                'general' => 'General',
                'cards' => 'Cards'
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
        'posttype' => [
            'columns' => [
                'id' => 'ID',
                'name' => 'Name',
            ],
            'fields' => [
                'name' => 'Name',
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
            'creating' => 'Creating...',
            'create_and_close' => 'Create and close',
            'update' => 'Update',
            'or' => 'or',
            'close' => 'Close',
            'delete_selected' => 'Delete selected',
            'delete' => 'Delete',
            'delete_confirm' => 'Are your sure?',
            'deleting' => 'Deleting...',
            'back' => 'Back',
            'save' => 'Save',
            'saving' => 'Saving...',
            'save_and_close' => 'Save and close',
        ],
        'categories' => [
            'name' => 'Categories',
        ],
        'posts' => [
            'name' => 'Posts',
            'tags' => 'Tags',
            'cards' => 'Cards'
        ],
        'posttypes' => [
            'name' => 'Post types',
        ],
        'tags' => [
            'name' => 'Tags',
        ],
    ],
];
