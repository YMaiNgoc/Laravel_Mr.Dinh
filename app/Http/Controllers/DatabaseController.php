<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    public function createTables()
    {
        // Tạo bảng Users
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->timestamps();
            });
        }

        // Tạo bảng Orders
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id'); // Khóa ngoại
                $table->date('order_date');
                $table->decimal('total_amount', 10, 2);
                $table->timestamps();

                // Tạo khóa ngoại
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }

        // Tạo bảng Order Details
        if (!Schema::hasTable('order_details')) {
            Schema::create('order_details', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('order_id'); // Khóa ngoại
                $table->string('product_name');
                $table->integer('quantity');
                $table->decimal('price', 10, 2);
                $table->timestamps();

                // Tạo khóa ngoại
                $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            });
        }

        return response()->json(['message' => 'Tables created successfully']);
    }
}
