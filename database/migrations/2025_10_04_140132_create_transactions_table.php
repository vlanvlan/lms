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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('invoice')->unique();
            $table->enum('status', ['pending', 'success', 'failed', 'expired']);
            $table->double('grand_total');
            $table->string('payment_gateway')->nullable();
            $table->string('snap_url')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->nullableMorphs('payable');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
