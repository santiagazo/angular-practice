<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('imageable_id')->unsigned();
            $table->string('imageable_type');
            $table->integer('sort_id');
            $table->string('author')->nullable();
            $table->string('title')->nullable();
            $table->text('caption');
            $table->string('image')->nullable();
            $table->string('color')->nullable();
            $table->string('position')->nullable();
            $table->string('repeat')->nullable();
            $table->string('scroll_type')->nullable();
            $table->string('cover')->nullable();
            $table->string('video')->nullable();
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
        Schema::drop('images');
    }
}
