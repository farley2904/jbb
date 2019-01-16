<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permission_role', function (Blueprint $table) {
            $table->integer('role_id')->unsigned()->default(1);
            $table->foreign('role_id')->references('id')->on('roles'); //внешний ключ ссылаеться на поле id таблички roles
            $table->integer('permission_id')->unsigned()->default(1); // не отрицательное, 1 по умолчанию
            $table->foreign('permission_id')->references('id')->on('permissions'); //внешний ключ ссылаеться на поле id таблички permissions
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permission_role', function (Blueprint $table) {
            //
        });
    }
}
