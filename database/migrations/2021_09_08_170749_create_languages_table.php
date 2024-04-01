<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('locale');
            $table->string('name');
            $table->string('flag');
            $table->boolean('active')->default(0);
            $table->json('translations')->nullable();
            $table->timestamps();
        });

        DB::table('languages')->insert(['locale' => 'es', 'name' => 'Español', 'flag' => 'es', 'active' => 0, 'translations' => null, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('languages')->insert(['locale' => 'ca', 'name' => 'Català', 'flag' => 'cat', 'active' => 0, 'translations' => null, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('languages')->insert(['locale' => 'en', 'name' => 'English', 'flag' => 'gb', 'active' => 1, 'translations' => null, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('languages')->insert(['locale' => 'de', 'name' => 'Deutschland', 'flag' => 'de', 'active' => 0, 'translations' => null, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('languages')->insert(['locale' => 'it', 'name' => 'Italiano', 'flag' => 'it', 'active' => 0, 'translations' => null, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('languages')->insert(['locale' => 'fr', 'name' => 'Français', 'flag' => 'fr', 'active' => 0, 'translations' => null, 'created_at' => now(), 'updated_at' => now()]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
