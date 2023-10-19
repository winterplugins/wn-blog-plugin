<?php

return [
    'plugin' => [
        'name' => 'Plugin de blog',
        'description' => 'Un plugin de blog simple',
        'navigation' => [
            'new_post' => 'Nouvel article',
            'blog' => 'Blog',
            'categories' => 'Catégories',
            'posts' => 'Articles',
            'tags' => 'Étiquettes'
        ],
    ],
    'settings' => [
        'name' => 'Blog',
        'blog_name' => 'Nom du blog',
        'blog_description' => 'Description du blog',
        'poster' => 'Auteur',
        'blog_name_color' => 'Couleur du nom du blog',
        'description_color' => 'Couleur de la description',
        'menu_color' => 'Couleur du menu',
        'menu_color_hover' => 'Couleur du menu (survol)',
        'menu_color_active' => 'Couleur du menu (actif)',
        'main_page_meta_title' => 'Titre de la page principale',
        'main_page_meta_description' => 'Description méta de la page principale',
        'tabs' => [
            'general' => 'Général',
            'colors' => 'Couleurs',
            'seo' => 'SEO'
        ]
    ],
    'models' => [
        'category' => [
            'columns' => [
                'id' => 'ID',
                'name' => 'Nom',
                'count' => 'Articles',
            ],
            'fields' => [
                'name' => 'Nom',
                'slug' => 'Slug',
            ],
        ],
        'post' => [
            'columns' => [
                'id' => 'ID',
                'category' => 'Catégorie',
                'name' => 'Nom',
                'active' => 'Actif',
                'published_at' => 'Publié le'
            ],
            'fields' => [
                'category' => 'Catégorie',
                'name' => 'Nom',
                'slug' => 'Slug',
                'type' => 'Type',
                'image' => 'Image',
                'small_text' => 'Description',
                'text' => 'Texte',
                'tags' => 'Étiquettes',
                'general' => 'Général',
                'blocks' => 'Blocs',
                'published_at' => 'Publié le'
            ],
        ],
        'posttag' => [
            'columns' => [
                'tag' => 'Étiquette',
            ],
            'fields' => [
                'tag' => 'Étiquette',
            ],
        ],
        'tag' => [
            'columns' => [
                'id' => 'ID',
                'name' => 'Nom',
            ],
            'fields' => [
                'name' => 'Nom',
                'slug' => 'Slug',
            ],
        ],
        'general' => [
            'id' => 'ID',
            'created_at' => 'Créé le',
            'updated_at' => 'Mis à jour le',
        ],
    ],
    'controllers' => [
        'common' => [
            'create' => 'Créer',
            'update' => 'Mettre à jour',
            'delete_selected' => 'Supprimer la sélection',
            'delete' => 'Supprimer',
            'delete_confirm' => 'Êtes-vous sûr ?',
            'deleting' => 'Suppression en cours...',
        ],
        'categories' => [
            'name' => 'Catégories',
        ],
        'posts' => [
            'name' => 'Articles',
            'tags' => 'Étiquettes',
            'blocks' => 'Blocs'
        ],
        'tags' => [
            'name' => 'Étiquettes',
        ],
    ],
    'components' => [
        'tag_view' => [
            'name' => 'Voir l’étiquette',
            'slug' => 'Slug'
        ],
        'post_view' => [
            'name' => 'Voir l’article',
            'slug' => 'Slug'
        ],
        'posts_list' => [
            'name' => 'Articles',
            'category_slug' => 'Catégorie',
            'limit' => 'Limite'
        ],
        'categories_list' => [
            'name' => 'Catégories'
        ]
    ]
];

