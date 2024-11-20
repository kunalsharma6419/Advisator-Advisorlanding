<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->foreign('user_id')->references('unique_id')->on('users')->onDelete('cascade');
            $table->date('date');
            $table->time('time');
            $table->enum('status', ['Booking 10% Deducted', 'Booking 10% Refunded', 'Discovery call Charges']);
            $table->enum('method', ['consultation call', 'discovery call', 'booking fees', 'booking refund']);
            $table->decimal('amount', 10, 2);
            $table->decimal('total_wallet_balance', 10, 2);
            $table->timestamps();
            $table->softDeletes(); // Adds deleted_at column for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_transactions');
    }
};
