<?php

use Illuminate\Database\Seeder;
use App\Models\FrontEnd\Users\BookUser as User;

class BookUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =Faker\Factory::create();
        
        foreach(range(1,30) as $i){
            User::create([
                "first_name"=>$faker->firstName,
                "last_name"=>$faker->lastName,
                "email"=>$faker->email
            ]);
        }
    }
}
