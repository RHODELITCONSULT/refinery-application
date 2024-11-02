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
        Schema::create('waybills', function (Blueprint $table) {
            $table->id();
            $table->string("product")->nullable();
            $table->string("category")->nullable();
            $table->string("description")->nullable();
            $table->string("volume")->nullable();
            $table->string("opening")->nullable();
            $table->string("closing")->nullable();
            $table->string("unit_number")->nullable();
            $table->string("meter")->nullable();
            $table->string("destination")->nullable();
            $table->string("driver")->nullable();
            $table->string("truck_head_number")->nullable();
            $table->string("truck_trailer_number")->nullable();
            $table->string("customer")->nullable();
            $table->string("order_type")->nullable();
            $table->string("barcode")->nullable();
            $table->string("consignor")->nullable();
            $table->string("added_by")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waybills');
    }
};
