<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->integer('price');
            $table->string('image');
            $table->unsignedBigInteger('cate_id'); // Định nghĩa khóa ngoại đúng
            $table->foreign('cate_id')->references('id')->on('categories')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products'); // Xóa đúng bảng khi rollback
    }
};
