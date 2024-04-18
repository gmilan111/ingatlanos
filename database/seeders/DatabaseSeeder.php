<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
           'name'=> 'Mike Coxlong',
            'email' => 'proba@gmail.com',
            'password' => Hash::make('12345678'),
            'is_ingatlanos' => 'i',
            'phone_number' => '06 70 774 3036',
            'notification_state' => 'Pest,Zala',
        ]);

        User::factory()->create([
            'name'=> 'Proba',
            'email' => 'proba2@gmail.com',
            'password' => Hash::make('12345678'),
            'is_ingatlanos' => 'm',
            'phone_number' => '06 71 72 3028',
            'notification_state' => 'Pest,Zala',
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
