<?php

namespace Dimsog\Blog\Updates;

use Dimsog\Blog\Models\PostType;
use Dimsog\Blog\Models\Tag;
use Seeder;

class TagsSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $tag = new Tag();
            $tag->name = 'Tag ' . $i;
            $tag->save();
        }
    }
}
