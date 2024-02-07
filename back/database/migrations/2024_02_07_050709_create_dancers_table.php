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
        Schema::create('dancers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('imagen');
            $table->string('lat')->default(0);
            $table->string('lng')->default(0);
            $table->string('video')->nullable()->default('W4s7d_4Erwo');
            $table->text('history')->nullable()->default('No hay historia');
            $table->integer('positionSaturday')->nullable();
            $table->integer('positionSunday')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dancers');
    }
};
