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
        Schema::create('product_catalogues', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('canonical')->nullable();
            $table->text('content')->nullable();
            $table->string('img')->nullable();
            $table->string('icon')->nullable();
            $table->text('album')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_des')->nullable();
            $table->string('meta_key')->nullable();
            $table->unsignedInteger('user_id');
            $table->nestedSet();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table', function (Blueprint $table) {
            $table->dropNestedSet();
        });
    }
};
