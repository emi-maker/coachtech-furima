<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->integer('price')->unsigned();
            $table->text('description');
            $table->unsignedBigInteger('user_id');
            $table->string('img', 255);
            $table->string('brand', 255)->nullable();
            $table->unsignedBigInteger('status_id')->constrained()->cascadeOnDelete();;
            $table->unsignedBigInteger('buyer_id')->nullable();
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
        Schema::dropIfExists('items');
    }
}
