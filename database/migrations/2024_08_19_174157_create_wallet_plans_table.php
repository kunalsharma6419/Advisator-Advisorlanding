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
        Schema::create('wallet_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name'); // Plan Name
            $table->decimal('plan_price', 8, 2); // Plan Price
            $table->text('plan_description'); // Plan Description
            $table->text('plan_features'); // Plan Features (Text for rich text editor)
            $table->enum('plan_status', ['active', 'expired', 'paused'])->default('active'); // Plan Status
            $table->softDeletes(); // Soft Deletes
            $table->timestamps(); // Timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_plans');
    }
};
