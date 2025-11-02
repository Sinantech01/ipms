<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();  
            $table->unsignedBigInteger('customer_id'); 
            $table->unsignedBigInteger('property_id'); 
            $table->decimal('amount', 10, 2);
            $table->string('transaction_id')->unique(); 
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('property_id')->references('id')->on('propertys')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
