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
            $table->foreignId('board_id')->references('id')->on('boards')->onDelete('cascade');
            $table->foreignId('dish_id')->references('id')->on('dishes')->onDelete('cascade');
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreignId('status_id')->references('id')->on('status')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['board_id']);
            $table->dropForeign(['dish_id']);
            $table->dropForeign(['client_id']);
            $table->dropForeign(['status_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('orders');
    }
}
