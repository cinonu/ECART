<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigInteger('id');
           
            $table->bigInteger('category_id');
            $table->string('Product_name')->nullable();
            $table->float('Price')->nullable();
            $table->string('Product_color')->nullable();
            $table->text('Product_Description')->nullable();
            $table->string('Product_code')->nullable();
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
        Schema::drop('products');
    }
}
