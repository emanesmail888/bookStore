<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_values', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('attribute_id')->unsigned()->nullable();
            $table->string('value');
            $table->bigInteger('book_attribute_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('attribute_id')->references('id')->on('book_attributes')->onDelete('cascade');
            $table->foreign('book_attribute_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_values');
    }
}
