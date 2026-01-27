<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('delivery_note', function (Blueprint $table) {
            $table->id();
            $table->string('num', 10);
            $table->date('issuedate');
            $table->unsignedBigInteger('order_id');
            //FK de order
            $table->foreign('order_id')->references('id')->on('orders');


            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('delivery_note');
    }
};
