<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->foreignId('level_id')->nullable()->constrained('levels');
            
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('slug')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->string('image')->nullable();
            $table->string('preview')->nullable();
            $table->text('description')->nullable();
            
            $table->boolean('featured')->nullable();
            $table->boolean('nft_certification')->nullable();

            $table->decimal('price', 27, 2)->nullable();
            $table->decimal('discount', 27, 2)->nullable();
            $table->string('discount_type')->nullable();
            $table->timestamp('discount_deadline')->nullable();

            $table->string('lang')->nullable();
            $table->json('requirements')->nullable();
            $table->json('translations')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
