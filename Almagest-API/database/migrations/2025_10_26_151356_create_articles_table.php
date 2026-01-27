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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('description',150)->nullable();
            $table->decimal('price_min',10,0);
            $table->decimal('price_max',10,0);
            $table->string('color_name',20)->nullable();
            $table->decimal('weight',10,2);
            $table->string('size',20)->nullable();
            $table->foreignId('family_id')->constrained('families')->onDelete('cascade');
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
