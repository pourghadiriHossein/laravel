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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->string('label',100);
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('parent_id')
            ->references('id')
            ->on('categories')
            ->nullOnDelete()
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
        Schema::dropIfExists('categories');
    }
};
