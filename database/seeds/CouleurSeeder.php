<?php

use App\Couleur;
use Illuminate\Database\Seeder;

class CouleurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Couleur::class,10)->create();
    }
}
