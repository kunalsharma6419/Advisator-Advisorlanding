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
        Schema::create('call_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('user_id'); // Foreign key as a string
            $table->foreign('user_id')->references('unique_id')->on('users')->onDelete('cascade');
            $table->string('advisor_id'); // Foreign key as a string
            $table->foreign('advisor_id')->references('advisor_id')->on('advisor_profiles')->onDelete('cascade');
            $table->decimal('overall_experience', 3, 1); // Decimal column, e.g., 8.5
            $table->decimal('reliability', 3, 1); // Decimal column
            $table->decimal('affordability', 3, 1); // Decimal column
            $table->decimal('relevance_to_problem', 3, 1); // Decimal column
            $table->longText('review'); // Long text column for the review
            $table->timestamps();
            $table->softDeletes(); // Adds a 'deleted_at' column for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('call_reviews');
    }
};

