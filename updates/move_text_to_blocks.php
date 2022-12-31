<?php

namespace Dimsog\Blog\Updates;

use Dimsog\Blog\Models\Post;
use Dimsog\Blog\Models\PostBlock;
use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;
use Winter\Storm\Support\Facades\DB;

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
                $block->text = $post->text;
                $block->type = 'text';
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
