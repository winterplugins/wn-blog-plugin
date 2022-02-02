<?php namespace Dimsog\Blog\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('dimsog_blog_categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedTinyInteger('active')->default(1)->index();
            $table->unsignedTinyInteger('hidden')->default(0)->index();
            $table->unsignedInteger('position')->default(0)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dimsog_blog_categories');
    }
}
