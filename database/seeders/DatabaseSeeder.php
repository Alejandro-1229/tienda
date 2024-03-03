<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DetalleSalida;
use App\Models\Productos;
use App\Models\ReporteSalida;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Productos::factory(50)->create();
        DetalleSalida::factory(100)->create();
        ReporteSalida::factory(100)->create();
        User::factory(3)->create();
    }
}
