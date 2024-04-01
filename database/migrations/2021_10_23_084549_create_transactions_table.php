<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');

            $table->string('type')->nullable();
            $table->decimal('initial_amount', 27, 2);
            $table->decimal('amount', 27, 2);
            $table->text('description')->nullable();
            $table->json('meta')->nullable();

            $table->timestamp('payment_date')->nullable();
            $table->string('payment_date_string')->nullable();
            $table->string('payment_date_day')->nullable();
            $table->string('payment_date_month')->nullable();
            $table->string('payment_date_year')->nullable();
            
            $table->string('payment_gateway')->nullable();
            $table->string('payment_id')->nullable();
            $table->enum('payment_status', ['pending', 'success', 'error', 'refunded', 'partial_refunded', 'cancelled'])->default('pending');

            $table->string('refund_id')->nullable();
            $table->timestamp('refund_date')->nullable();
            $table->decimal('refunded_amount', 27, 2)->nullable();
            $table->boolean('refunding')->default(0);

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
        Schema::dropIfExists('transactions');
    }
}
