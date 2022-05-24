<?php

use Illuminate\Database\Seeder;

use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags =
        [
            'Primavera',
            'Amatriciana',
            'Diritti delle donne',
            'Seconda guerra mondiale',
            'Sviluppatori',
            'Autunno',
            'Babbo Natale',
            'Amazon',
            'Messico'
        ];


        foreach ($tags as $tag) {

            Tag::create([
                'name' => $tag,
                'slug' => Str::slug($tag)
            ]);

        }

    }
}
