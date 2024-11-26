<?php

namespace Database\Seeders;

use App\Models\Dojo;
use App\Models\Ninja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NinjaDojoIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ninja::all()->each(function ($ninja) {
            $ninja->update([
                'dojo_id' => Dojo::inRandomOrder()->first()->id
            ]);
        });
    }
}
