<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('symbol')->nullable();
            $table->integer('decimals')->nullable();
            $table->string('network')->nullable();
            $table->string('address')->nullable();
            $table->string('checksum')->nullable();
            $table->string('logo')->nullable();
            $table->timestamp('firstreport')->nullable();
            $table->timestamp('lastreport')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('tokens')->insert([
            'name' => 'Scan DeFi V2',
            'symbol' => 'SCAN',
            'decimals' => 9,
            'network' => 'BSC',
            'address' => '0xccce542413528cb57b5761e061f4683a1247adcb',
            'checksum' => '0xCCcE542413528CB57B5761e061F4683A1247aDCB',
            'logo' => '/images/logos/logo.svg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokens');
    }
}
