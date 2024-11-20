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
        Schema::create('wallet_recharges', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->unsignedBigInteger('plan_id');
            $table->decimal('amount', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->decimal('platform_fees', 10, 2);
            $table->decimal('total_amount', 10, 2);
            $table->enum('recharge_status', ['Success', 'Failure', 'Cancelled', 'Pending'])->default('Pending');
            $table->timestamps();

            $table->foreign('user_id')->references('unique_id')->on('users')->onDelete('cascade');
            $table->foreign('plan_id')->references('id')->on('wallet_plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_recharges');
    }
};
