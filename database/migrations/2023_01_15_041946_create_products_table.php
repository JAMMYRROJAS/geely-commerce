<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();
            $table->string('large_description', 500)->nullable();
            $table->string('small_description')->nullable();
            $table->integer('stock')->default(0);
            $table->string('image')->default('sin_foto.png');
            $table->decimal('sell_price', 12,2);
            $table->enum('status', ['ACTIVATE', 'DESACTIVATE'])->default('ACTIVATE');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
