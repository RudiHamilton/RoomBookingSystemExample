<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'first_name' => 'Rudi',
            'second_name'=> 'Hamilton',
            'phone_number'=>'12345678910',
            'email' => 'rudihamilton11@outlook.com',
            'password' => Hash::make('password'),
            'credit'=>'5000',
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);
        $this->call(RoomSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BookingSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);

        
    }
}
