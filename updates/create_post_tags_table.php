<?php namespace Dimsog\Blog\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class CreatePostTagsTable extends Migration
{
    public function up()
    {
        Schema::create('dimsog_blog_post_tags', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('tag_id');

            $table->foreign('post_id')->references('id')->on('dimsog_blog_posts')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('tag_id')->references('id')->on('dimsog_blog_tags')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dimsog_blog_post_tags');
    }
}
