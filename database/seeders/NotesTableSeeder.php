<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('liste')->insert([
            [
                'content' => 'Faire les devoirs.',
                'etat' => false
            ],
            [
                'content' => 'Acheter des courses.',
                'etat' => true
            ],
            [
                'content' => 'Appeler le médecin.',
                'etat' => false
            ],
            [
                'content' => 'Préparer le dîner.',
                'etat' => true
            ]
        ]);
    }
}
