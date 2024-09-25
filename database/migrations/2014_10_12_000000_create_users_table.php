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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('mobile', 50)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_validation')->default(0);
            $table->boolean('is_active')->default(0);
            $table->string('password');
            $table->string('image' , 100)->nullable();
            $table->string('file')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->longText('device_token',)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
