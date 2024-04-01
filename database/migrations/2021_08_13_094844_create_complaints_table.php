<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->json('names')->nullable();
            $table->json('descriptions')->nullable();
            $table->string('color')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Insert token complaints
        DB::table('complaints')->insert(['type' => 'token', 'description' => "Owners have a history of participating/being associated with scams", 'descriptions' => json_encode(['en' => "Owners have a history of participating/being associated with scams"]), 'color' => '#FFC700']);
        DB::table('complaints')->insert(['type' => 'token', 'description' => "You can't sell the token", 'descriptions' => json_encode(['en' => "You can't sell the token"]), 'color' => '#2A63FF']);
        DB::table('complaints')->insert(['type' => 'token', 'description' => "Doesn't have a whitepaper", 'descriptions' => json_encode(['en' => "Doesn't have a whitepaper"]), 'color' => '#21D59B']);
        DB::table('complaints')->insert(['type' => 'token', 'description' => "Doesn't have a website/social media", 'descriptions' => json_encode(['en' => "Doesn't have a website/social media"]), 'color' => '#FFC700']);
        DB::table('complaints')->insert(['type' => 'token', 'description' => "The owners have an excessive amount of the market", 'descriptions' => json_encode(['en' => "The owners have an excessive amount of the market"]), 'color' => '#2A63FF']);
        DB::table('complaints')->insert(['type' => 'token', 'description' => "Doesn't have a project", 'descriptions' => json_encode(['en' => "Doesn't have a project"]), 'color' => '#21D59B']);
        DB::table('complaints')->insert(['type' => 'token', 'description' => "The token has been created to pump and dump", 'descriptions' => json_encode(['en' => "The token has been created to pump and dump"]), 'color' => '#FFC700']);
        DB::table('complaints')->insert(['type' => 'token', 'description' => "Doesn't have blocked liquidity", 'descriptions' => json_encode(['en' => "Doesn't have blocked liquidity"]), 'color' => '#2A63FF']);
        DB::table('complaints')->insert(['type' => 'token', 'description' => "They are impersonating someone they are not", 'descriptions' => json_encode(['en' => "They are impersonating someone they are not"]), 'color' => '#FFC700']);
        DB::table('complaints')->insert(['type' => 'token', 'description' => "They are lying about their team", 'descriptions' => json_encode(['en' => "They are lying about their team"]), 'color' => '#21D59B']);
        DB::table('complaints')->insert(['type' => 'token', 'description' => "They use unethical methods of marketing (bots, spam etc..)", 'descriptions' => json_encode(['en' => "They use unethical methods of marketing (bots, spam etc..)"]), 'color' => '#2A63FF']);
        DB::table('complaints')->insert(['type' => 'token', 'description' => "There is no direct contact with the resposible person", 'descriptions' => json_encode(['en' => "There is no direct contact with the resposible person"]), 'color' => '#21D59B']);
        DB::table('complaints')->insert(['type' => 'token', 'description' => "They don't answer messages since a long time ago", 'descriptions' => json_encode(['en' => "They don't answer messages since a long time ago"]), 'color' => '#FFC700']);
        DB::table('complaints')->insert(['type' => 'token', 'description' => "Owners are not transparent", 'descriptions' => json_encode(['en' => "Owners are not transparent"]), 'color' => '#2A63FF']);

        // Insert presale complaints
        // DB::table('complaints')->insert(['type' => 'presale', 'description' => "Gave the money but didn't get anything in exchange", 'descriptions' => json_encode(['en' => "Gave the money but didn't get anything in exchange"]), 'color' => '#FFC700']);
        // DB::table('complaints')->insert(['type' => 'presale', 'description' => "Owners are not transparent", 'descriptions' => json_encode(['en' => "Owners are not transparent"]), 'color' => '#2A63FF']);
        // DB::table('complaints')->insert(['type' => 'presale', 'description' => "Owners have a history of participating/being associated with scams", 'descriptions' => json_encode(['en' => "Owners have a history of participating/being associated with scams"]), 'color' => '#2A63FF']);
        // DB::table('complaints')->insert(['type' => 'presale', 'description' => "There is no project", 'descriptions' => json_encode(['en' => "There is no project"]), 'color' => '#21D59B']);
        // DB::table('complaints')->insert(['type' => 'presale', 'description' => "They use unethical methods of marketing (bots, spam etc..)", 'descriptions' => json_encode(['en' => "They use unethical methods of marketing (bots, spam etc..)"]), 'color' => '#FFC700']);
        // DB::table('complaints')->insert(['type' => 'presale', 'description' => "They don't answer messages since a long time ago", 'descriptions' => json_encode(['en' => "They don't answer messages since a long time ago"]), 'color' => '#2A63FF']);
        // DB::table('complaints')->insert(['type' => 'presale', 'description' => "They don't have any social media", 'descriptions' => json_encode(['en' => "They don't have any social media"]), 'color' => '#21D59B']);
        // DB::table('complaints')->insert(['type' => 'presale', 'description' => "There is no direct contact with the resposible person", 'descriptions' => json_encode(['en' => "There is no direct contact with the resposible person"]), 'color' => '#FFC700']);
        // DB::table('complaints')->insert(['type' => 'presale', 'description' => "They are impersonating someone they are not", 'descriptions' => json_encode(['en' => "They are impersonating someone they are not"]), 'color' => '#2A63FF']);
        // DB::table('complaints')->insert(['type' => 'presale', 'description' => "There is no buying limit", 'descriptions' => json_encode(['en' => "There is no buying limit"]), 'color' => '#FFC700']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints');
    }
}
