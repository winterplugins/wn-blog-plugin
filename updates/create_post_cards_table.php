<?php namespace Dimsog\Blog\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class CreatePostCardsTable extends Migration
{
    public function up()
    {
        Schema::create('dimsog_blog_post_cards', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('post_id');
            $table->string('type');
            $table->longText('text')->nullable();
            $table->longText('code')->nullable();
            $table->longText('images')->nullable();

            $table->foreign('post_id')
                ->references('id')
                ->on('dimsog_blog_posts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dimsog_blog_post_cards');
    }
}
