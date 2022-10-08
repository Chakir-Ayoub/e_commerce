<?php

use App\Taille;
use Illuminate\Database\Seeder;

class TailleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Taille::class,10)->create();
    }
}
