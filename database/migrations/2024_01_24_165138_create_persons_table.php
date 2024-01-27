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
        Schema::create('persons', function (Blueprint $table) {

            $table->id();
            $table->string('given_name', 255)->nullable(FALSE);
            $table->string('family_name', 255)->nullable(FALSE);
            $table->string('gender', 8)->nullable();
            $table->date('birthdate')->nullable(FALSE);
            $table->string('email', 255)->nullable(FALSE);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number', 16)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
