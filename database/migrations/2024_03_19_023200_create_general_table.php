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
        Schema::create('general', function (Blueprint $table) {
            $table->id();
            $table->string('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('company_name')->nullable();
            $table->text('introduce')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->integer('phone')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general');
    }
};
