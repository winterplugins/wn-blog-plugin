<?php

namespace Dimsog\Blog\Updates;

use Dimsog\Blog\Models\Post;
use Dimsog\Blog\Models\PostBlock;
use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class MoveTextToBlocks extends Migration
{
    public function up()
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            if (!empty($post->text)) {
                $block = new PostBlock();
                $block->post_id = $post->id;
                $block->position = 1;
                $block->text = 1;
                $block->save();
            }
        }

        Schema::table('dimsog_blog_posts', function (Blueprint $table) {
            $table->dropColumn('text');
        });
    }

    public function down()
    {

    }
}
