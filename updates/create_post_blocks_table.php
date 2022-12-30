<?php namespace Dimsog\Blog\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class CreatePostBlocksTable extends Migration
{
    public function up()
    {
        Schema::create('dimsog_blog_post_blocks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('post_id')->nullable();
            $table->string('type');
            $table->longText('text')->nullable();
            $table->longText('code')->nullable();
            $table->longText('images')->nullable();
            $table->unsignedInteger('position')->default(0)->index();

            $table->foreign('post_id')
                ->references('id')
                ->on('dimsog_blog_posts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dimsog_blog_post_blocks');
    }
}
