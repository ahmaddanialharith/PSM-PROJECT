<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('invoice_items', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('invoice_id');
        $table->string('item_no');
        $table->string('description');
        $table->decimal('price', 10, 2);
        $table->decimal('amount', 10, 2);
        $table->timestamps();

        $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};
