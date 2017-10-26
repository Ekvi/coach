<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('clientId')->unsigned();
            $table->string('day', 20);
            $table->integer('exerciseId')->unsigned();
            $table->integer('setId')->unsigned();
            $table->timestamp('createdAt')->nullable();
            $table->timestamp('updatedAt')->nullable();

            $table->index('clientId');
            $table->index('exerciseId');
            $table->index('setId');

            $table->foreign('clientId')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('exerciseId')->references('id')->on('exercises')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('setId')->references('id')->on('sets')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainings');
    }
}
