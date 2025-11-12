<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buildings', function (Blueprint $table) {
        $table->id();
        $table->string('building_id', 10)->unique();  // BLD001 format
        $table->string('name');
        $table->string('address')->nullable();
        $table->boolean('status')->default(1);       // boolean to match model casting
        $table->timestamps();
    });

    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};
