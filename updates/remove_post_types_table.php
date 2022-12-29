<?php

namespace Dimsog\Blog\Updates;

use Dimsog\Blog\Models\Post;
use Winter\Storm\Support\Facades\Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class RemovePostTypesTable extends Migration
{
    public function up()
    {
        Schema::table('dimsog_blog_posts', function (Blueprint $table) {
            $table->dropForeign('dimsog_blog_posts_type_id_foreign');
            $table->string('type')->nullable()->index();
        });

        $posts = Post::all();
        foreach ($posts as $post) {
            if ($post->type_id == 1) {
                $post->type = 'post';
            }
            if ($post->type_id == 2) {
                $post->type = 'status';
            }
            $post->save();
        }
        Schema::table('dimsog_blog_posts', function (Blueprint $table) {
            $table->dropColumn('type_id');
        });
        Schema::dropIfExists('dimsog_blog_post_types');
    }

    public function down()
    {

    }
}
