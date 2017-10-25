<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDayColumnToFoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('foods', function($table) {
            $table->string('day', 20);
            $table->renameColumn('created_at', 'createdAt');
            $table->renameColumn('updated_at', 'updatedAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('foods', function($table) {
            $table->dropColumn('day');
        });
    }
}
