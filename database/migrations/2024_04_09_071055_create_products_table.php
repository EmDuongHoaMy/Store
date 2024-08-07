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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->bigInteger('price')->nullable();
            $table->longText('description')->nullable();
            $table->integer('quantity')->nullable();
            $table->json('images')->nullable();
            $table->unsignedBigInteger('products_catalogue_id');
            $table->timestamps();

            $table->foreign('products_catalogue_id')->references('id')->on('product_catalogues')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
