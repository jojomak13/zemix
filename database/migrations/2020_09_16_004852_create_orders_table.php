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
            $table->string('client_name');
            $table->string('phone');
            $table->text('content')->nullable();
            $table->mediumText('description')->nullable();
            $table->mediumText('notes')->nullable();
            $table->mediumText('address');
            $table->json('history')->default('[]'); 
            $table->string('barcode')->nullable()->unique();
            $table->double('price', 7, 2);
            $table->double('shipping_price', 5, 2);
            $table->unsignedBigInteger('seller_id');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('status_id');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('CASCADE');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('SET NULL');
            $table->timestamps();
            $table->engine = 'InnoDB';
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
