<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUserNormalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_normals', function (Blueprint $table) {
            $table->string('poste')->nullable();
            $table->string('sexe')->nullable();
            $table->string('nomGit')->nullable();
            $table->string('nomLinkdIn')->nullable();
            $table->string('nomFacebook')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_normals', function (Blueprint $table) {
            //
        });
    }
}
