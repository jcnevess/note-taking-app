<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        Note::factory()
            ->count(35)
            ->create();

        $tags = Tag::all();

        Note::all()->each(fn($note) => 
            $note->tags()->attach(
                $tags->random(3)->pluck('id')->toArray()
            )
        );
    }
}
