<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{

    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->longText('description');
            $table->integer('added_by');
            $table->integer('patient_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
