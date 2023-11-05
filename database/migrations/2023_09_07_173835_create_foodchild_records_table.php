<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foodchild_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('child_id'); // 保育園児のID
            $table->date('record_date'); // 記録日付け
            $table->string('meal_type'); // 食事の種類（朝食、昼食、おやつなど）
            $table->string('meal_description'); // 食事内容やメモ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foodchild_records');
    }
};
