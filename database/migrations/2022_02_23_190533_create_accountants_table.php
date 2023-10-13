<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountants', function (Blueprint $table) {
            $table->id();
            $table->enum('gender',['مؤنث','ذكر']);
            $table->string('address');
            $table->string('salary');
            $table->string('date_of_birth');
            $table->string('date_joining');
            $table->enum('status',['مفعل','معطل'])->default('مفعل');
            $table->string('mobile_phone',30);
            $table->string('home_phone',30)->nullable();
            $table->string('identify_no')->unique();
            $table->integer('user_id');
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
        Schema::dropIfExists('accountants');
    }
}
