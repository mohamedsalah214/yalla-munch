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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('order_number')->unique();
            $table->string('firstname', 120);
            $table->string('lastname', 120);
            $table->string('phone', 120);
            $table->string('email', 120);
            $table->foreignId('city_id')->nullable();
            $table->foreignId('area_id')->nullable();
            // $table->foreignId('city_id')->nullable()->constrained('cities');
            // $table->foreignId('area_id')->nullable()->constrained('areas');
            $table->string('street');
            $table->enum('property_type', ['apartment', 'villa', 'other']);
            $table->string('building');
            $table->string('floor');
            $table->string('apartment');
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled'])->default('pending');
            $table->enum('payment_status', ['unpaid', 'paid'])->default('unpaid');
            $table->enum('payment_method', ['cash_on_delivery', 'credit_card', 'wallet'])->nullable()->default('cash_on_delivery');
            $table->decimal('total_amount', 10, 2);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
