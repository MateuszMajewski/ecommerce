<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ItemInCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_in_carts', function (Blueprint $table) {
            $table->id();
            $table->timestamp('added_on')->useCurrent = true;
            $table->foreignId('user_id');
            $table->foreignId('product_id');
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cart', function (Blueprint $table) {
            Schema::dropIfExists('items_in_carts');
        });
    }
}
