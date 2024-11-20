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
        Schema::table('customer_support_tickets', function (Blueprint $table) {
            $table->dropForeign(['advisor_profile_id']); // Drop foreign key constraint
            $table->dropColumn('advisor_profile_id'); // Drop the column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('customer_support_tickets', function (Blueprint $table) {
            $table->string('advisor_profile_id')->nullable();
            $table->foreign('advisor_profile_id')->references('advisor_id')->on('advisor_profiles')->onDelete('cascade');
        });
    }
};
