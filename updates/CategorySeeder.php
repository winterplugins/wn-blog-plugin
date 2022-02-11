<?php

namespace Dimsog\Blog\Updates;

use Dimsog\Blog\Models\Category;
use Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 5) as $number) {
            $category = new Category();
            $category->name = 'Category ' . $number;
            $category->save();
        }
    }
}
