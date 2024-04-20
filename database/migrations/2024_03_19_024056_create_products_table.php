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

            $table->unsignedBigInteger('categories_id');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('subcategories_id')->nullable();
            $table->foreign('subcategories_id')
                ->references('id')
                ->on('subcategories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('brands_id')->nullable();
            $table->foreign('brands_id')->references('id')->on('brands')->onDelete('cascade')->onUpdate('cascade');


            $table->string('name');
            $table->string('alias');

            $table->integer('views')->default(0);
            $table->integer('best_rated')->default(0);
            $table->integer('best_seller')->default(0);
            $table->tinyInteger('trend')->default(0);
            $table->tinyInteger('featured')->default(0);
            $table->tinyInteger('hidden')->default(1);
            $table->dateTime('target_time')->nullable();

            $table->timestamps();
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
