<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Agents;
use App\Models\Images;
use App\Models\MainImage;
use App\Models\Properties;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Agent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'=> 'Joe',
            'email' => 'joe@gmail.com',
            'password' => Hash::make('12345678'),
            'is_ingatlanos' => 'i',
            'phone_number' => '06 70 774 3036',
        ]);

        User::factory()->create([
            'name'=> 'Dan',
            'email' => 'dan@gmail.com',
            'password' => Hash::make('12345678'),
            'is_ingatlanos' => 'i',
            'phone_number' => '06 70 774 3036',
        ]);

        Agents::factory()->create([
            'user_id' => 1,
            'salary' => '2% és 5% között',
            'experience' => 5,
            'language' => 'Angol, Német',
            'description' => 'Üdvözlöm, nevem Jon, és több mint 5 év tapasztalattal rendelkezem az ingatlanpiacon. Szakértőként célom, hogy ügyfeleimnek a legmegfelelőbb otthont találjam, figyelembe véve egyedi igényeiket és preferenciáikat. Szakterületem közé tartozik a lakásvásárlás, eladás és bérbeadás, különös hangsúlyt fektetve a modern és korszerű ingatlanokra.',
        ]);

        Agents::factory()->create([
            'user_id' => 2,
            'salary' => '1% és 4% között',
            'experience' => 3,
            'language' => 'Angol, Spanyol',
            'description' => 'Üdvözlöm, nevem Dan, és több mint 3 év tapasztalattal rendelkezem az ingatlanpiacon. Szakértőként célom, hogy ügyfeleimnek a legmegfelelőbb otthont találjam, figyelembe véve egyedi igényeiket és preferenciáikat. Szakterületem közé tartozik a lakásvásárlás, eladás és bérbeadás, különös hangsúlyt fektetve a modern és korszerű ingatlanokra.',
        ]);

        User::factory()->create([
            'name'=> 'Gebei Milán',
            'email' => 'gebei.milan@gmail.com',
            'password' => Hash::make('12345678'),
            'is_ingatlanos' => 'm',
            'phone_number' => '06 71 72 3028',
            'notification_state' => "[\"Győr-Moson-Sopron\",\"Vas\"]",
            'auction_entered' => false,
        ]);

        $myfile = fopen(asset("seeder\properties.txt"), "r") or die("Unable to open file!");
        while(!feof($myfile)) {
            $valami = explode('; ',fgets($myfile));
            Properties::factory()->create([
                'user_id' => 1,
                'settlement' => $valami[0],
                'state' => $valami[2],
                'price' => $valami[4],
                'rooms' => $valami[5],
                'bathrooms' => $valami[6],
                'description' => $valami[26],
                'address' => $valami[1],
                'size' => $valami[3],
                'condition' => $valami[10],
                'year_construction' => $valami[7],
                'floor' => $valami[8],
                'building_levels' => $valami[9],
                'lift' => $valami[11],
                'inner_height' => $valami[12],
                'air_conditioner' => $valami[13],
                'accessible' => $valami[14],
                'attic' => $valami[15],
                'balcony' => $valami[16],
                'parking' => $valami[17],
                'parking_price' => $valami[18],
                'avg_gas' => $valami[19],
                'avg_electricity' => $valami[20],
                'overhead_cost' => $valami[21],
                'common_cost' => $valami[22],
                'heating' => $valami[23],
                'insulation' => $valami[24],
                'type' => $valami[25],
                'sale_rent' => 'sale',
                'auction_price' => $valami[4],
            ]);
        }

        for ($i = 1; $i <= 10; $i++){
            MainImage::factory()->create([
                'properties_id' => $i,
                'main_img' => "property_main_images/".$i."_1.png",
            ]);

            for ($j = 2; $j <= 5; $j++){
                Images::factory()->create([
                    'properties_id' => $i,
                    'images' => "property_images/".$i."_".$j.".png",
                ]);
            }
        }



    }
}
