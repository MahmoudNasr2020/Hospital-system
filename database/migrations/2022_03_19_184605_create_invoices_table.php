<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
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
            $table->foreignId('patient_id');
            $table->string('invoice_number');
            $table->double('total');
            $table->double('amount_paid')->default(0);
            $table->enum('payment_type',['نقدي','الكتروني'])->nullable();
            $table->enum('payment_status',['مدفوع كلياً','مدفوع جزئياً','غير مدفوع'])->default('غير مدفوع');
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
        Schema::dropIfExists('invoices');
    }
}
