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
        Schema::table('appointment_bookings', function (Blueprint $table) {
            $table->timestamp('booking_date')->nullable()->after('user_id');
            $table->string('booking_link')->nullable()->after('booking_date');
            $table->boolean('is_booked')->default(false)->after('status'); // Adjust 'existing_column' as needed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointment_bookings', function (Blueprint $table) {
            $table->dropColumn(['is_booked', 'booking_date', 'booking_link']);
        });
    }
};
