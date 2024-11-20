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
            $table->enum('booking_medium', ['Discovery Call', 'Consultation Call'])->default('Consultation Call');
            $table->enum('booking_status', ['Upcoming', 'Completed', 'Pending', 'Rejected'])->default('Pending');
            $table->decimal('booking_amount', 8, 2)->nullable(); // Adjust precision as needed
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
            $table->dropColumn('booking_medium');
            $table->dropColumn('booking_status');
            $table->dropColumn('booking_amount');
        });
    }
};
