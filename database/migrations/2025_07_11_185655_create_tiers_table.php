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
        Schema::create('tiers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // مثلاً: برنز، نقره، طلا
            $table->string('color_code'); // کد HEX رنگ
            $table->integer('min_points'); // حداقل امتیاز برای این سطح
            $table->integer('max_points')->nullable(); // حداکثر امتیاز (اختیاری)
            $table->text('benefits')->nullable(); // مزایای این سطح
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiers');
    }
};
