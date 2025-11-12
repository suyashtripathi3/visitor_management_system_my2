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
           Schema::table('users', function (Blueprint $table) {
               $table->string('phone_number')->nullable()->after('password');
               $table->string('profile_pic')->nullable()->after('phone_number');
               $table->foreignId('department_id')->nullable()->constrained()->cascadeOnDelete()->after('profile_name');
               $table->foreignId('designation_id')->nullable()->constrained()->cascadeOnDelete()->after('department_id');
               $table->enum('status', ['active', 'inactive'])->default('active')->after('designation_id');
        
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('users', function (Blueprint $table) {

                    // Drop foreign key for department_id
                    $table->dropForeign(['department_id']);
                    $table->dropColumn('department_id');

                    // Drop foreign key for designation_id
                    $table->dropForeign(['designation_id']);
                    $table->dropColumn('designation_id');

                    // Drop status column
                    $table->dropColumn('status');

                    // Drop profile_name column
                    $table->dropColumn('profile_name');
                });
    }
    
};
