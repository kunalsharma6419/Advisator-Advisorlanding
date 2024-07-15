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
        Schema::table('advisor_profiles', function (Blueprint $table) {
            $table->string('profile_photo_path')->nullable()->after('email'); // Add after 'email' for better organization
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advisor_profiles', function (Blueprint $table) {
            $table->dropColumn('profile_photo_path');
        });
    }
};
