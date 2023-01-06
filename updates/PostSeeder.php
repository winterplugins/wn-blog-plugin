<?php

declare(strict_types=1);

namespace Dimsog\Blog\Updates;

use Dimsog\Blog\Models\Category;
use Dimsog\Blog\Models\Post;
use Dimsog\Blog\Models\PostBlock;
use System\Models\File;
use Winter\Storm\Database\Updates\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::orderBy('id')->first();
        if (empty($category)) {
            return;
        }
        $post = new Post();
        $post->name = 'Blog theme';
        $post->slug = 'blog-theme';
        $post->active = true;
        $post->small_text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultricies maximus augue, ac aliquet dui posuere id. Duis metus magna, iaculis in dolor at, bibendum ornare metus. Suspendisse semper varius accumsan.';
        $fileModel = new File();
        $fileModel->fromFile(__DIR__ . '/assets/post.jpg');
        $post->image = $fileModel;
        $post->type = 'post';
        $post->category_id = $category->id;
        $post->save();

        $block1 = new PostBlock();
        $block1->post_id = $post->id;
        $block1->type = 'text';
        $block1->text = '<p>Mauris vitae volutpat erat. Quisque odio nisl, feugiat id iaculis sed, pharetra et nisl. Nulla sed nulla in enim congue viverra. Vivamus tellus diam, hendrerit et odio id, iaculis vestibulum est. Curabitur eu lacinia nulla, sit amet rhoncus enim. Vivamus iaculis nisl eu elit accumsan, non auctor neque finibus. Phasellus eget ligula non eros vestibulum consectetur.</p>';
        $block1->save();

        $block2 = new PostBlock();
        $block2->post_id = $post->id;
        $block2->type = 'code';
        $block2->code = "<script>console.log('An example code');</script>";
        $block2->save();

        $block3 = new PostBlock();
        $block3->post_id = $post->id;
        $block3->type = 'text';
        $block3->text = '<p>Quisque et faucibus ipsum. Aliquam consequat augue diam, quis aliquam augue tristique quis. Cras sit amet imperdiet felis. Aliquam erat volutpat. Fusce id sapien rutrum, tristique nibh ultrices, accumsan leo. Nam iaculis tempus libero, nec feugiat lacus. Pellentesque eu elit sapien. Cras dictum iaculis ullamcorper.</p>';
        $block3->save();

        $block4 = new PostBlock();
        $block4->post_id = $post->id;
        $block4->type = 'image';
        $fileModel2 = new File();
        $fileModel2->fromFile(__DIR__ . '/assets/post2.jpg');
        $block4->image = $fileModel2;
        $block4->save();

        $block4 = new PostBlock();
        $block4->post_id = $post->id;
        $block4->type = 'text';
        $block4->text = '<p>Cras consectetur dignissim pellentesque. Morbi bibendum sagittis lorem, at sagittis nibh efficitur nec. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque vel ornare massa. Vestibulum quis vehicula erat. Sed congue, lacus et mollis tincidunt, sem arcu ultrices leo, vitae congue eros sem ut dui. Morbi dignissim convallis leo vel interdum. Vestibulum blandit cursus tincidunt. Sed scelerisque lacus molestie mauris bibendum, ac consectetur lorem sodales. Donec tristique vitae tortor vitae facilisis.</p>';
        $block4->save();
    }
}
