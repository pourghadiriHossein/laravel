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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->decimal('amount',22,2);
            $table->unsignedTinyInteger('status')->default(1);
            $table->unsignedBigInteger('IDPay_track_id')->nullable();
            $table->string('IDPay_id')->nullable();
            $table->string('card_no')->nullable();
            $table->string('pay_date')->nullable();
            $table->string('verify_date')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('order_id')
            ->references('id')
            ->on('orders')
            ->onDelete('cascade')
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
        Schema::dropIfExists('transactions');
    }
};
