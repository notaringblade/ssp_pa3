<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table){
            // $table->bigInteger('contact')->change();
            // $table->id()->startingValue(0);
            $table->string('highest_qualification')->default('Bachelors')->change();
            $table->string('institution')->default('chowgules')->change();
            $table->integer('year')->default(2003)->change();
            $table->string('specialization')->default('General')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
