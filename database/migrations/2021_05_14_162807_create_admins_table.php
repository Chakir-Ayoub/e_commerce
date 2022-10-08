<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('admins', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('UserName');
        //     $table->string('NomUsr')->nullable();
        //     $table->string('PrenomUsr')->nullable();
        //     $table->string('email', 191)->unique();
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('password');
        //     // $table->integer('AdresseNumUsr')->nullable();
        //     // $table->string('AdresseUsr')->nullable();
        //     // $table->integer('CodePostalClt')->nullable();
        //     // $table->string('VilleUsr')->nullable();
        //     // $table->string('PaysUsr')->nullable();
        //     // $table->string('TelUsr')->nullable();
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
