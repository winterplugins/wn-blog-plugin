<?php

namespace Dimsog\Blog\Updates;

use Dimsog\Blog\Models\PostType;
use Seeder;

class PostTypeSeeder extends Seeder
{
    public function run()
    {
        $type = new PostType();
        $type->name = 'Обычная запись';
        $type->save();

        $type = new PostType();
        $type->name = 'Статус';
        $type->save();
    }
}
