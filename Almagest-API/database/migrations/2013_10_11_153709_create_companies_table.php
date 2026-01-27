<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('address', 100);
            $table->string('city', 50);
            $table->string('cif', 10);
            $table->string('email', 40);
            $table->string('phone', 9);

            $table->unsignedBigInteger('del_term_id');
            //FK de delivery_terms
            $table->foreign('del_term_id')->references('id')->on('delivery_terms');


            $table->unsignedBigInteger('transport_id');
            //FK de transports
            $table->foreign('transport_id')->references('id')->on('transports');

            $table->unsignedBigInteger('payment_term_id');
            //FK de payment_terms
            $table->foreign('payment_term_id')->references('id')->on('payment_terms');

            $table->unsignedBigInteger('bank_entity_id');
            //FK de bank_entity
            $table->foreign('bank_entity_id')->references('id')->on('bank_entities');


            $table->unsignedBigInteger('discount_id');
            //FK de discount
            $table->foreign('discount_id')->references('id')->on('discount');

            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
