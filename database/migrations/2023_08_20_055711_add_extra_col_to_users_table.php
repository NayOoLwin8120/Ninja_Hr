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
            $table->string('phone')->unique()->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->text('address')->nullable();
            $table->String('employee_id')->nullable();
            // $table->bigInteger('department_id')->nullable();

            $table->boolean('is_present')->default(true);
            $table->enum('role', ['hr', 'employee'])->default('employee');
            $table->text('profile')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone',  'birthday', 'gender', 'address', 'employee_id', 'is_present', 'profile', 'role']);
            // $table->dropColumn(['phone', 'nrc_number', 'birthday', 'gender', 'address', 'employee_id', 'department_id', 'date_of_join', 'is_present', 'profile']);
        });
    }
};
