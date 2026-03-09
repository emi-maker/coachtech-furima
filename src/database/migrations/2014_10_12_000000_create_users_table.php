<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) 
        {

        $table->id();
        $table->string('name', 255);
        $table->string('email', 255)->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');

        $table->string('post_code', 20)->nullable();
        $table->string('address', 255)->nullable();
        $table->string('building',225)->nullable();
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
