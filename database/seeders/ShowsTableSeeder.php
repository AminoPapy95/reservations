<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;
use App\Models\Show;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ShowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('shows')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //Define data
        $shows = [
            [
                'slug' => null,
                'title' => 'Ayiti',
                'description' => "Un homme est bloqué à l’aéroport.\n "
                    . 'Questionné par les douaniers, il doit alors justifier son identité, '
                    . 'et surtout prouver qu\'il est haïtien – qu\'est-ce qu\'être haïtien ?',
                'poster_url' => 'ayiti.jpg',
                'location_id' => 4,
                'bookable' => true,
                'price' => 8.50,
            ],
            [
                'slug' => null,
                'title' => 'Cible mouvante',
                'description' => 'Dans ce « thriller d’anticipation », des adultes semblent alimenter '
                    . 'et véhiculer une crainte féroce envers les enfants âgés entre 10 et 12 ans.',
                'poster_url' => 'cible.jpg',
                'location_id' => 1,
                'bookable' => true,
                'price' => 9.00,
            ],
            [
                'slug' => null,
                'title' => 'Ceci n\'est pas un chanteur belge',
                'description' => "Non peut-être ?!\nEntre Magritte (pour le surréalisme comique) "
                    . 'et Maigret (pour le réalisme mélancolique), ce dixième opus semalien propose '
                    . 'quatorze nouvelles chansons mêlées à de petits textes humoristiques et '
                    . 'à quelques fortes images poétiques.',
                'poster_url' => 'claudebelgesaison220.jpg',
                'location_id' => 2,
                'bookable' => false,
                'price' => 5.50,
            ],
            [
                'slug' => null,
                'title' => 'Manneke… !',
                'description' => 'A tour de rôle, Pierre se joue de ses oncles, '
                    . 'tantes, grands-parents et surtout de sa mère.',
                'poster_url' => 'wayburn.jpg',
                'location_id' => 3,
                'bookable' => true,
                'price' => 10.50,
            ],
        ];

        //Insert data in the table
        foreach ($shows as $data) {
            $location = Location::firstWhere('id', $data['location_id']);

            DB::table('shows')->insert([
                'slug' => Str::slug($data['title']),
                'title' => $data['title'],
                'description' => $data['description'],
                'poster_url' => $data['poster_url'],
                'location_id' => $location->id ?? null,
                'bookable' => $data['bookable'],
                'price' => $data['price'],
            ]);
        }
    }
}
