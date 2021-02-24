<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesseurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_professeur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('FirstName',50);
            $table->string('LastName',50);
            $table->string('Email',256);
            $table->string('UserName',50);
            $table->string('PassWord',255);
            $table->rememberToken();
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
        Schema::dropIfExists('_professeur');
    }
}
