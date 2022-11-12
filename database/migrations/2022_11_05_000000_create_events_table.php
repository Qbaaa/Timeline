<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->nullable();
            $table->string('name')->nullable();
            $table->string('short_description')->nullable();
            $table->text('detailed_description')->nullable();
            $table->string('file_image')->nullable();
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types')
                ->onDelete('cascade');
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
        Schema::dropIfExists('events');
    }
};
