<?php

namespace Database\Seeders;

use App\Models\Ninja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NinjaWeaponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ninja::all()->each(function ($ninja) {
            $ninja->update(['weapon' => fake()->randomElement([
                'Katana',         // Short, straight blade for lethal strikes
                'Shuriken',       // Throwing stars for ranged attacks
                'Kunai',          // Multi-purpose dagger for stabbing and throwing
                'Sai',            // Pronged weapon for defense and fatal strikes
                'Kusarigama',     // Chain and sickle for slashing and entangling
                'Manriki-gusari', // Weighted chain for striking or strangling
                'Blowgun',        // Fires poison darts for silent kills
                'Tanto',          // Close-combat dagger
                'Nunchaku',       // Blunt force weapon for high-impact hits
                'Tekko-kagi',     // Claw-like weapon for deadly slashes
            ])]);
        });
    }
}
