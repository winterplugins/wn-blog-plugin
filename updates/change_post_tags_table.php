<?php namespace Dimsog\Blog\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class ChangePostTagsTable extends Migration
{
    public function up()
    {
        Schema::table('dimsog_blog_post_tags', function (Blueprint $table) {
            $table->unsignedInteger('post_id')->nullable()->change();
        });
    }

    public function down()
    {
    }
}
