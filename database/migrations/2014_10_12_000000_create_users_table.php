<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->enum('gender',['Male','Female'])->nullable();
            $table->string('phone_number1',14)->nullable();
            $table->string('phone_number2',14)->nullable();            
            $table->date('birthdate')->nullable();
            $table->string('bio')->nullable();
            $table->enum('marital_status',['Single','Engaged','Married'])->default('Single');
            $table->string('hometown')->nullable();
            $table->string('image')->nullable();            
            $table->string('email')->unique();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
