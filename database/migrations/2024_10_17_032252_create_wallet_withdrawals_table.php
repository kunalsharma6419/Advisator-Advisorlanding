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
        Schema::create('wallet_withdrawals', function (Blueprint $table) {
            $table->id();
            $table->string('advisor_profile_id');
            $table->foreign('advisor_profile_id')->references('advisor_id')->on('advisor_profiles')->onDelete('cascade');
            $table->decimal('withdraw_amount', 10, 2);
            $table->string('bank_account_number');
            $table->string('bank_ifsc');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_withdrawals');
    }
};
