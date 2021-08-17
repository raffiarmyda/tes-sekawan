<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('drivers_id')->constrained('drivers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('vehicles_id')->constrained('vehicles')->onDelete('cascade')->onUpdate('cascade');
            $table->string('created_by');
            $table->string('driver_name');
            $table->string('driver_number');
            $table->string('driver_license');
            $table->string('vehicle_name');
            $table->string('vehicle_type');
            $table->string('vehicle_description');
            $table->string('rent_company');
            $table->string('approval');
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
        Schema::dropIfExists('orders');
    }
}
