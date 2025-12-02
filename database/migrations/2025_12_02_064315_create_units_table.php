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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('property_type');
            $table->string('county');
            $table->string('town');
            $table->string('street');
            $table->string('pin')->nullable();
            $table->decimal('rent', 10, 2);
            $table->decimal('deposit', 10, 2);
            $table->string('service_charge');
            $table->integer('water_electricity_billing');
            $table->string('payment_mode');
            $table->integer('bathroom_number');
            $table->string('size');
            $table->string('balcony');
            $table->string('kitchen_type');
            $table->string('wardrobes');
            $table->string('tiles');
            $table->string('wifi');
            $table->string('water_availability');
            $table->string('parking');
            $table->string('security');
            $table->string('lift');
            $table->string('backup_generator');
            $table->string('laundry_area');
            $table->string('pets_allowed');
            $table->string('garbage_collection_area');
            $table->string('photos');
            $table->string('video');
            $table->string('is_house_available');
            $table->string('minimum_lease_period');
            $table->string('name');
            $table->string('phone_number');
            $table->string('alternative_phone_number')->nullable();
            $table->string('landlord_agent');
            $table->string('prefered_payment_method');
            $table->integer('viewing_fee')->nullable();
            $table->string('viewing_schedule')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
