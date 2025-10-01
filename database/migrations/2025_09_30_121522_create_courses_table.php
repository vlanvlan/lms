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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('image')->nullable();
            $table->enum('level', ['beginer', 'intermediate', 'advanced']);
            $table->double('price');
            $table->double('discount_price')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->string('demo')->nullable();
            $table->timestamps();
        });
    }
};
