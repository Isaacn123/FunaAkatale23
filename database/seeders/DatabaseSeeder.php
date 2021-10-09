<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     
        $faker = Faker::create();

        foreach(range(0, 30) as $index){
          DB::table('businesses')->insert([
            'name' => $faker->company,
            'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
            'website' => $faker->domainName,
            'slug' => $faker->slug,
            'andress' => $faker-> address,
            'email' => $faker->unique()->safeEmail,
            'contact' => $faker->phoneNumber ,
            'categoryName' => 'category',
            'subcategoryName' => 'safeSubcategory',
            'country' => $faker-> country,
            'fax' => $faker->unique()-> tollFreePhoneNumber,
            'city' => $faker-> city,
            'image' => $faker -> imageUrl($width = 640, $height = 480),
            'created_at' => $faker->dateTimeBetween('-6 month','+1 month')
          ]);
        }

        // \App\Models\User::factory(10)->create();
    }
}
