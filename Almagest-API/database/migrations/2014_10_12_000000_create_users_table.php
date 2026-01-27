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
            $table->string('firstname', 15);
            $table->string('secondname', 50);
            $table->string('email', 40)->unique();
            $table->string('password');

            //clave foránea de companies
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');

            $table->string('type', 1)->nullable();
            $table->tinyInteger('email_confirmed')->default(0);
            $table->tinyInteger('activated')->default(0);
            $table->tinyInteger('iscontact')->default(0);
            $table->tinyInteger('deleted')->default(0);
            //estos ya venían
            $table->timestamp('email_verified_at')->nullable();
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
