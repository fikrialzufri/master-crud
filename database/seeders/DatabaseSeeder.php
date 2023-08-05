<?php

namespace Database\Seeders;

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
        $this->call([
            UsersTableSeedeer::class,
            ProvinsiSeeder::class,
            KotaSeeder::class,
            BankSeeder::class,
            JabatanSeeder::class,
            CabangSeeder::class,
            JenisPembayaranSeeder::class,
            MetodePembayaranSeeder::class,
            HargaSeeder::class,
            JenisLayananSeeder::class,
            JenisTagihanSeeder::class,
            AkunKasSeeder::class,
        ]);
    }
}