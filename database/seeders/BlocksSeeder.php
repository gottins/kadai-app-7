<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blocks;

class BlocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blocks::create([
            'user' => '1',
            'block_user' => '2',
        ]);
        Blocks::create([
            'user' => '1',
            'block_user' => '3',
        ]);
        Blocks::create([
            'user' => '2',
            'block_user' => '3',
        ]);
    }
}
