<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTables extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('type')->default('comment')->nullable();
            $table->text('content');
            $table->json('translations')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('commentables', function (Blueprint $table) {
            $table->foreignId('comment_id')->constrained()->cascadeOnDelete();
            $table->morphs('commentable');

            $table->unique(['comment_id', 'commentable_id', 'commentable_type']);
        });
    }

    public function down()
    {
        Schema::drop('commentables');
        Schema::drop('comments');
    }
}
