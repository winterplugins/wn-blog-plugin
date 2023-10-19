<?php namespace Dimsog\Blog\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class AddPublishedAtToPosts extends Migration
{
    public function up()
    {
        Schema::table('dimsog_blog_posts', function (Blueprint $table) {
            $table->timestamp('published_at')->nullable();
        });
    }

    public function down()
    {
        if (Schema::hasColumn('dimsog_blog_posts', 'published_at')) {
            Schema::table('dimsog_blog_posts', function (Blueprint $table) {
                $table->dropColumn('published_at');
            });
        }
    }
}
