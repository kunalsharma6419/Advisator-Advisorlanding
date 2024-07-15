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
        Schema::create('bank_details', function (Blueprint $table) {
            $table->id();
            $table->string('advisor_profile_id');
            $table->foreign('advisor_profile_id')->references('advisor_id')->on('advisor_profiles')->onDelete('cascade');
            $table->string('bank_name');
            $table->string('account_holder_name');
            $table->string('account_number');
            $table->enum('account_type', ['saving', 'current']);
            $table->string('bank_ifsc');
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
        Schema::dropIfExists('bank_details');
    }
};
