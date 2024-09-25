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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('r_reservations_username')->nullable();
            $table->string('r_reservations_email')->nullable();
            $table->string('r_reservations_phone')->nullable();
            $table->string('r_reservations_seats')->default(1);
            $table->foreignId('e_event_id')->constrained('events')->cascadeOnUpdate()->cascadeOnDelete() ;
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
