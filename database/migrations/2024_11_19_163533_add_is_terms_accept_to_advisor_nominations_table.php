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
        Schema::table('advisor_nominations', function (Blueprint $table) {
            $table->boolean('is_terms_accept')->default(false);  // Adding the is_terms_accept field
        });
    }
    
    public function down()
    {
        Schema::table('advisor_nominations', function (Blueprint $table) {
            $table->dropColumn('is_terms_accept');  // Rolling back the is_terms_accept field
        });
    }
    
};
