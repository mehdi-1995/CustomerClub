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
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('activity_type_id')->constrained();
            $table->integer('amount'); // مقدار امتیاز (مثبت یا منفی)
            $table->string('source')->nullable(); // منبع امتیاز (مثلاً سفارش شماره ۱۲۳)
            $table->date('expires_at')->nullable(); // تاریخ انقضا
            $table->boolean('is_used')->default(false);
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->index('user_id');
            $table->index('expires_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points');
    }
};
