<?php

namespace Database\Seeders;

use App\Models\Desease;
use Illuminate\Database\Seeder;

class DeseaseSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Desease::create([
            'name' => 'desease 1',
        ]);
        Desease::create([
            'name' => 'desease 2',
        ]);
    }
}
