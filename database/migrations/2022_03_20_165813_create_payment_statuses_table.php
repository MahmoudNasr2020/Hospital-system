<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentStatusesTable extends Migration
{

    public function up()
    {
        Schema::create('payment_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id');
            $table->foreignId('added_by');
            $table->double('total_paid');
            $table->double('amount_paid')->default(0);
            $table->enum('payment_type',['نقدي','الكتروني'])->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('payment_statuses');
    }
}
