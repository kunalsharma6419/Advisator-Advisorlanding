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
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id();
            $table->string('advisor_nomination_id');
            $table->foreign('advisor_nomination_id')->references('nominee_id')->on('advisor_nominations')->onDelete('cascade');
            $table->string('day');
            $table->string('time_slot');
            $table->boolean('availability_status')->default(false); // Default to false
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
        Schema::dropIfExists('availabilities');
    }
};
