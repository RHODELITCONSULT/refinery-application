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
        Schema::create('consignors', function (Blueprint $table) {
            $table->id();
            $table->string("consignor");
            $table->string("contact_number")->nullable();
            $table->string("contact_email")->nullable();
            $table->string("address")->nullable();
            $table->string("city")->nullable();
            $table->string("landmark")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consignors');
    }
};
