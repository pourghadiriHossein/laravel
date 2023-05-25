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
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->string('label',100);
            $table->string('description',10000);
            $table->decimal('price',20,2);
            $table->integer('count')->unsigned()->default(0);
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('discount_id')
            ->references('id')
            ->on('discounts')
            ->nullOnDelete()
            ->cascadeOnUpdate();

            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
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
