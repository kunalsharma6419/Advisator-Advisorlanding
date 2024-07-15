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
        Schema::create('advisor_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('advisor_id', 12);
            $table->foreign('advisor_id')->references('nominee_id')->on('advisor_nominations')->onDelete('cascade');
            $table->string('user_id');
            $table->foreign('user_id')->references('unique_id')->on('users')->onDelete('cascade');
            $table->string('full_name');
            $table->string('email');
            $table->string('mobile_number');
            $table->string('location');
            $table->string('linkedin_profile')->nullable();
            $table->unsignedBigInteger('business_function_category_id');
            $table->foreign('business_function_category_id')->references('id')->on('business_function_categories');
            $table->unsignedBigInteger('sub_function_category_id_1')->nullable();
            $table->foreign('sub_function_category_id_1')->references('id')->on('sub_function_categories');
            $table->unsignedBigInteger('sub_function_category_id_2')->nullable();
            $table->foreign('sub_function_category_id_2')->references('id')->on('sub_function_categories');
            $table->json('industry_ids')->nullable(); // Store industry IDs as JSON array
            $table->json('geography_ids')->nullable(); // Store geography IDs as JSON array
            $table->string('advisor_qualification')->nullable();
            $table->integer('advisor_experience')->nullable();
            $table->text('advsior_skills')->nullable();
            $table->decimal('discovery_call_price_per_minute', 8, 2)->nullable();
            $table->decimal('discovery_call_price_per_hour', 8, 2)->nullable();
            $table->decimal('conference_call_price_per_minute', 8, 2)->nullable();
            $table->decimal('conference_call_price_per_hour', 8, 2)->nullable();
            $table->decimal('chat_price_per_minute', 8, 2)->nullable();
            $table->decimal('chat_price_per_hour', 8, 2)->nullable();
            // Adding new columns
            $table->json('highlighted_images')->nullable(); // Store image paths as JSON array, max 5 images
            $table->enum('is_super_advisor', ['true', 'false'])->default('false');
            $table->boolean('is_available')->default(true);
            $table->enum('language_known', ['English', 'Hindi'])->nullable();
            $table->json('services')->nullable(); // Store services as JSON array
            $table->json('awards_recognition')->nullable(); // Store awards and recognitions as JSON array
            $table->json('video_upload')->nullable(); // Store video paths as JSON array, max 2 videos
            $table->text('about')->nullable(); // Cover letter and about the advisor
            $table->boolean('is_founder')->default(false);
            $table->string('company_name')->nullable();
            $table->string('company_website')->nullable();
            $table->enum('nomination_status', ['inprogress', 'selected', 'rejected'])->default('inprogress');
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
        Schema::dropIfExists('advisor_profiles');
    }
};
