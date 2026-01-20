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
        Schema::create('journeys', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique(); // Hova megyünk
            $table->integer("price"); // Mennyibe kerül forintban
            $table->double("travel_time"); // Hány óra odautazni (pl.: 4,3)
            $table->boolean("visa")->default(false); // Kell-e vízum
            $table->text("description");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journeys');
    }
};
