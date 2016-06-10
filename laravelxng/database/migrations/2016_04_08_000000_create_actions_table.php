<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('priority_id')->unsigned()->nullable();
            $table->integer('activate_day')->unsigned()->nullable();
            $table->timestamp('activate_at')->nullable();
            $table->integer('expire_day')->unsigned()->nullable();
            $table->timestamp('expire_at')->nullable();
            $table->integer('add_points')->unsigned()->nullable();
            $table->integer('subtract_points')->nullable();
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
         Schema::drop('actions');
    }
}
