<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ProduitSeeder::class);
        $this->call(CommandeSeeder::class);
        // $this->call(AdminSeeder::class);
        
        $this->call(CouleurSeeder::class);
        $this->call(TailleSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(DetailcommandeSeeder::class);
        $this->call(StockSeeder::class);
    }
}
