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
        Schema::create('user_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->foreign('user_id')->references('unique_id')->on('users')->onDelete('cascade');
            $table->string('full_name');
            $table->string('email');
            $table->string('mobile_number');
            $table->string('location');
            $table->unsignedBigInteger('business_function_category_id')->nullable();
            $table->foreign('business_function_category_id')->references('id')->on('business_function_categories');
            $table->unsignedBigInteger('sub_function_category_id_1')->nullable();
            $table->foreign('sub_function_category_id_1')->references('id')->on('sub_function_categories');
            $table->unsignedBigInteger('sub_function_category_id_2')->nullable();
            $table->foreign('sub_function_category_id_2')->references('id')->on('sub_function_categories');
            $table->json('industry_ids')->nullable(); // Store industry IDs as JSON array
            $table->json('geography_ids')->nullable(); // Store geography IDs as JSON array
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
        Schema::dropIfExists('user_registrations');
    }
};
