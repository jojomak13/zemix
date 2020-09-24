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
            $table->text('content')->nullable();
            $table->mediumText('description')->nullable();
            $table->mediumText('notes')->nullable();
            $table->string('address');
            $table->json('history'); // kdkdk
            $table->string('barcode')->unique();
            $table->double('price', 6, 2);
            $table->unsignedBigInteger('seller_id');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('status_id');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->foreign('seller_id')->references('id')->on('sellers');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('driver_id')->references('id')->on('drivers');
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
