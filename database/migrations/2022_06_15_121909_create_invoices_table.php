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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoiceId')->unique();
            $table->string('invoiceTitle')->nullable();
            $table->string('createDate');
            $table->string('executeDate');
            $table->integer('discount');
            $table->string('subTotal');
            $table->string('total');
            $table->integer('payment_penality_days')->default(30);
            $table->float('payment_penality_rate')->default(6.37);
            $table->string('notes');
            $table->integer('status')->default(0);
            $table->foreignId('client_id')->references('id')->on('users');
            $table->foreignId('editor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
