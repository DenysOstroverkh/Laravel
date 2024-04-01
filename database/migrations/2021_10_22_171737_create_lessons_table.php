<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->constrained('units');
            $table->string('type')->nullable();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('opened')->nullable()->default(1);
            $table->text('content')->nullable();
            $table->integer('priority')->default(1);
            $table->string('image')->nullable();
            $table->string('preview')->nullable();
            $table->text('description')->nullable();
            $table->integer('duration')->nullable();
            $table->json('meta')->nullable();
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
        Schema::dropIfExists('lessons');
    }
}
