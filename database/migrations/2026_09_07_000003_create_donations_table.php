<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->string('tracking_id')->nullable();
            $table->string('bank_ref_no')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('currency', 10)->default('INR');
            $table->string('billing_name');
            $table->string('billing_email');
            $table->string('billing_tel')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('cause')->nullable();
            $table->string('order_status')->default('Pending');
            $table->string('payment_mode')->nullable();
            $table->text('raw_response')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
