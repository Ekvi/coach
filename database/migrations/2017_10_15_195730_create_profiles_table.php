<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('clientId')->unsigned();
            $table->string('name', 50)->default('');
            $table->integer('age')->unsigned();
            $table->string('gender', 10);
            $table->integer('height')->unsigned();
            $table->integer('weight')->unsigned();
            $table->text('goal');
            $table->string('place', 10)->default('');
            $table->boolean('experience');
            $table->tinyInteger('days')->unsigned();
            $table->text('trauma');
            $table->text('medicalConstraints');
            $table->text('food');
            $table->text('allergy');

            $table->index('clientId');

            $table->foreign('clientId')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
