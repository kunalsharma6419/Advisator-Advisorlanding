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
        Schema::create('advisor_evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('advisor_nomination_id');
            $table->foreign('advisor_nomination_id')->references('nominee_id')->on('advisor_nominations')->onDelete('cascade');
            $table->integer('experience_score');
            $table->integer('expertise_score');
            $table->integer('linkedin_score');
            $table->integer('availability_score');
            $table->integer('industry_recognition_score');
            $table->integer('recommendations_score');
            $table->integer('content_leadership_score');
            $table->integer('connections_score');
            $table->float('overall_score')->nullable();
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
        Schema::dropIfExists('advisor_evaluations');
    }
};
