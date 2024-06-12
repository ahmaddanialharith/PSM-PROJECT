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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('device_id')->constrained()->onDelete('cascade');
            $table->text('problem_description');
            $table->string('previous_repairs')->nullable();
            $table->string('pictures')->nullable();
            $table->string('service_type');
            $table->string('urgency_level')->nullable();
            $table->string('under_warranty')->nullable();
            $table->string('warranty_provider')->nullable();
            $table->string('data_backup_required')->nullable();
            $table->string('data_wipe_consent')->nullable();
            $table->text('sensitive_data')->nullable();
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
    }
};
