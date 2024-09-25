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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('e_events_name')->nullable();
            $table->date('e_events_date')->nullable();
            $table->time('e_events_from')->nullable();
            $table->time('e_events_to')->nullable();
            $table->integer('e_events_available')->nullable();
            $table->tinyInteger('e_events_status')->default(0);
            $table->string('e_events_speaker')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
