<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('name');
            $table->string('uuid')->after('id');
            $table->string('first_name')->after('uuid');
            $table->string('last_name')->after('first_name');
            $table->string('phone')->unique()->nullable()->after('last_name');
            $table->tinyInteger('role_id')->default(2)->nullable()->after('password');//recheck change default to master client user role id
            $table->tinyInteger('master_id')->nullable()->after('role_id');
            $table->tinyInteger('is_active')->default(0)->nullable()->after('master_id'); // recheck
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropForeign(['role_id'])->default(1);
            $table->dropColumn('role_id');
        });
    }
}
