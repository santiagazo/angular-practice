<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFireteamUserPermissionPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fireteam_user_permission', function (Blueprint $table) {
            $table->integer('fireteam_user_id')->unsigned()->index();
            $table->foreign('fireteam_user_id')->references('id')->on('fireteam_user')->onDelete('cascade');
            $table->integer('permission_id')->unsigned()->index();
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->primary(['fireteam_user_id', 'permission_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fireteam_user_permission');
    }
}
