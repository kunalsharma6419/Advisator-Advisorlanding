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
            DB::statement('ALTER TABLE advisor_profiles MODIFY services LONGTEXT');
            DB::statement('ALTER TABLE advisor_profiles MODIFY awards_recognition LONGTEXT');
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
            DB::statement('ALTER TABLE advisor_profiles MODIFY services JSON');
            DB::statement('ALTER TABLE advisor_profiles MODIFY awards_recognition JSON');
        });
    }
};
