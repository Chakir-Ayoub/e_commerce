<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigInteger("prouduit_id")->unsigned();
            $table->bigInteger("couleur_id")->unsigned();
            $table->bigInteger("taille_id")->unsigned();
            $table->integer("Qte")->default(0);
            $table->timestamps();

            $table->foreign("prouduit_id")->references("id")->on("produits")->onUpdate("cascade")->onDelete('cascade');
            $table->foreign("couleur_id")->references("id")->on("couleurs")->onUpdate("cascade")->onDelete('cascade');
            $table->foreign("taille_id")->references("id")->on("tailles")->onUpdate("cascade")->onDelete('cascade');

            $table->primary(array('prouduit_id', 'couleur_id','taille_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
