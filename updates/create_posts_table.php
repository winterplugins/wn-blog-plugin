<?php namespace Dimsog\Blog\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('dimsog_blog_posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->unsignedInteger('category_id');
            $table->unsignedInteger('type_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('small_text', 2048)->nullable();
            $table->text('text')->nullable();
            $table->unsignedTinyInteger('active')->default(0)->index();

            $table->foreign('category_id')->references('id')->on('dimsog_blog_categories')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('type_id')->references('id')->on('dimsog_blog_post_types')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dimsog_blog_posts');
    }
}
