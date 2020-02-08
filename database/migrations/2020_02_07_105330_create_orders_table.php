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
            $table->bigIncrements('id');
            $table->unsignedInteger('wp_id')->nullable();
            $table->string('status', 255)->nullable();
            $table->string('currency', 255)->nullable();
            $table->unsignedDecimal('total')->nullable();
            $table->string('payment_method', 255)->nullable();
            $table->text('billing')->nullable();
            $table->text('shipping')->nullable();
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
