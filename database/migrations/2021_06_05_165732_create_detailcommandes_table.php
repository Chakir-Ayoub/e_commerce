<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailcommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailcommandes', function (Blueprint $table) {
            $table->bigInteger("commande_id")->unsigned();
            $table->bigInteger("produit_id")->unsigned();
            $table->bigInteger("image_id")->unsigned();
            $table->integer("QteCommande")->default(0);
            $table->timestamps();

            $table->foreign("commande_id")->references("id")->on("commandes")->onUpdate("cascade")->onDelete('cascade');
            $table->foreign("produit_id")->references("id")->on("produits")->onUpdate("cascade")->onDelete('cascade');
            $table->foreign("image_id")->references("id")->on("images")->onUpdate("cascade")->onDelete('cascade');

            $table->primary(array('commande_id', 'produit_id','image_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailcommandes');
    }
}
