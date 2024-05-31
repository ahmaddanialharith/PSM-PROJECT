<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepairformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairforms', function (Blueprint $table) {
            $table->id();
            $table->string('smartphone_model');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('contact_number');
            $table->string('country');
            $table->string('street_address');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->text('issue_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repairforms');
    }
}
