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
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('outlet_id')->constrained()->cascadeOnDelete();
            $table->foreignId('package_id')->constrained()->cascadeOnDelete();
            $table->foreignId('member_id')->constrained()->cascadeOnDelete();
            $table->string('invoice_kode', 100);
            $table->dateTime('date');
            $table->dateTime('payment_deadline');
            $table->dateTime('payment_date');
            $table->integer('additional_cost');
            $table->integer('discount');
            $table->integer('tax');
            $table->enum('order_status', ['baru', 'proses', 'selesai', 'diambil']);
            $table->enum('payment_status', ['paid', 'unpaid']);
            $table->integer('qty');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
