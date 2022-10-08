<?php

use App\Detailcommande;
use Illuminate\Database\Seeder;

class DetailcommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Detailcommande::class, 10)->create();
    }
}
