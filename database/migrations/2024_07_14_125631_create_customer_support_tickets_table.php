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
        Schema::create('customer_support_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('advisor_profile_id');
            $table->foreign('advisor_profile_id')->references('advisor_id')->on('advisor_profiles')->onDelete('cascade');
            $table->string('subject');
            $table->text('description');
            $table->string('attachment')->nullable();
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
        Schema::dropIfExists('customer_support_tickets');
    }
};
