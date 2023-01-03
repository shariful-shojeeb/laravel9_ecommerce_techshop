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
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('category_id');
            $table->string('brand_id')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_unit')->nullable();
            $table->string('product_tag')->nullable();
            $table->string('product_purchase_price')->nullable();
            $table->string('product_selling_price')->nullable();
            $table->string('product_discount_price')->nullable();
            $table->string('product_quantity')->nullable();
            $table->string('product_alert_quantity')->nullable();
            $table->text('product_description')->nullable();
            $table->text('related_products')->nullable();
            $table->string('product_thumbnail')->nullable();
            $table->text('product_images')->nullable();
            $table->tinyInteger('product_featured_status')->default('0');
            $table->tinyInteger('product_status')->default('1');
            $table->tinyInteger('product_delete_status')->default('0');
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
