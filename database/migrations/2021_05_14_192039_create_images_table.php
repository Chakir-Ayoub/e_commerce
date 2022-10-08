<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string("Image")->unique();
            $table->bigInteger("produit_id")->unsigned();
            $table->bigInteger("couleur_id")->unsigned();
            $table->timestamps();

            $table->foreign("produit_id")->references("id")->on("produits")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("couleur_id")->references("id")->on("couleurs")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
