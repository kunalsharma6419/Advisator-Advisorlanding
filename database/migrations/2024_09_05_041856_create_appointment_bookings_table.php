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
        Schema::create('appointment_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id', 9)->unique();
            $table->string('advisor_id');
            $table->foreign('advisor_id')->references('advisor_nomination_id')->on('availabilities')->onDelete('cascade');
            $table->string('user_id');
            $table->foreign('user_id')->references('unique_id')->on('users')->onDelete('cascade');
            $table->string('day');
            $table->string('time_slot');
            $table->boolean('status')->default(false); // 0 for pending, 1 for confirmed
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
        Schema::dropIfExists('appointment_bookings');
    }
};
