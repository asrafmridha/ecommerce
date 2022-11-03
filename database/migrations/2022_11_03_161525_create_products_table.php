<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('vendor_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('subcategory_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('product_title')->nullable();
            $table->integer('product_code')->nullable();
            $table->float('discount')->nullable();
            $table->float('discount_price')->nullable();
            $table->float('product_price')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('status')->nullable();
            $table->integer('star')->nullable();
            $table->string('image')->nullable();  
            
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
        Schema::dropIfExists('products');
    }
};
