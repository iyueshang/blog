<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->comment('分类ID');
            $table->integer('user_id')->unsigned()->comment('用户ID');
            $table->string('slug')->unique();
            $table->string('title')->comment('标题');
            $table->string('subtitle')->comment('子标题');
            $table->text('content')->comment('内容');
            $table->string('image')->nullable()->comment('图片');
            $table->string('meta_description')->nullable()->comment('描述');
            $table->boolean('is_original')->default(false)->comment('原创');
            $table->boolean('is_draft')->default(false)->comment('草稿');
            $table->integer('view_count')->unsigned()->default(0)->index()->comment('查看量');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
