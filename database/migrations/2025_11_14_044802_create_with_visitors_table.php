<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('with_visitors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movement_id');
            $table->string('in_with')->nullable();
            $table->string('out_with')->nullable();
            $table->timestamps();

            $table->foreign('movement_id')
                ->references('id')
                ->on('visitor_movement_histories')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('with_visitors');
    }
};
