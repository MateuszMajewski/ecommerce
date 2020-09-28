<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created')->useCurrent = true;;
            $table->foreignId('category_id');
            $table->text('name')->default('');
            $table->integer('price')->default('0');
            $table->text('description')->default('');
            $table->text('image_url')->default('');
            $table->integer('stock_amount')->default('0');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
