<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('title');
            $table->string('slug');
            $table->mediumText('description');
            $table->string('article_date');
            $table->string('publish_date');
            $table->string('thumbnail');
            $table->string('filename');

            $table->string('img_title');
            $table->string('img_caption');
            $table->string('img_desc');
            $table->string('img_alt');
            $table->string('img_featured');
            $table->string('excerpt');

            $table->string('author');

            $table->string('meta_title');
            $table->mediumText('meta_description');
            $table->mediumText('meta_keyword');

            $table->tinyInteger('status');
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
