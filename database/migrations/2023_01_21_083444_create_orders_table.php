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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->decimal('total_price',20,2);
            $table->decimal('pay_price',20,2);
            $table->unsignedTinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreign('address_id')
            ->references('id')
            ->on('addresses')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreign('discount_id')
            ->references('id')
            ->on('discounts')
            ->nullOnDelete()
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
        Schema::dropIfExists('orders');
    }
};
