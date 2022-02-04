<?php namespace Dimsog\Blog\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class AddViewsToPosts extends Migration
{
    public function up()
    {
        Schema::table('dimsog_blog_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('views')->default(0);
        });
    }

    public function down()
    {
        if (Schema::hasColumn('dimsog_blog_posts', 'views')) {
            Schema::table('dimsog_blog_posts', function (Blueprint $table) {
                $table->dropColumn('views');
            });
        }
    }
}
