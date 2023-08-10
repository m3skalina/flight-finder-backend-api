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
        Schema::disableForeignKeyConstraints();

        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('code_departure', 3);
            $table->foreign('code_departure')->references('code')->on('airports');
            $table->string('code_arrival', 3);
            $table->foreign('code_arrival')->references('code')->on('airports');
            $table->double('price', 2);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
