<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('identify_no')->unique();
            $table->enum('gender',['مؤنث','ذكر']);
            $table->string('address')->nullable();
            $table->integer('age');
            $table->string('date_exiting')->nullable();
            $table->string('date_joining');
            $table->string('mobile_phone',30)->unique()->nullable();
            $table->string('photo')->default('patients/default.png');
            $table->foreignId('room_id')->nullable();
            $table->foreignId('room_added')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
