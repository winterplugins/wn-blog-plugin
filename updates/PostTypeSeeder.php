<?php

namespace Dimsog\Blog\Updates;

use Dimsog\Blog\Models\PostType;
use Seeder;

class PostTypeSeeder extends Seeder
{
    public function run()
    {
        $type = new PostType();
        $type->name = 'Post';
        $type->save();

        $type = new PostType();
        $type->name = 'Status';
        $type->save();
    }
}
