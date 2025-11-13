<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('visitor_meeting_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visitor_id');
            $table->unsignedBigInteger('movement_id'); // linked with visitor movement
            $table->unsignedBigInteger('user_id')->nullable();

            $table->string('purpose')->nullable();
            $table->json('venues')->nullable();

            $table->date('meeting_date')->nullable();
            $table->dateTime('meeting_time')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign(columns: 'visitor_id')->references('id')->on('visitors')->onDelete('cascade');
            $table->foreign('movement_id')->references('id')->on('visitor_movement_histories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_meeting_details');
    }
};
