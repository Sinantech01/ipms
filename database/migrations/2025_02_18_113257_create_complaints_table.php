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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->text('complaint');
            $table->text('status');
            $table->unsignedBigInteger('customer_id'); 
            $table->unsignedBigInteger('property_id'); 

            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('property_id')->references('id')->on('propertys')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
