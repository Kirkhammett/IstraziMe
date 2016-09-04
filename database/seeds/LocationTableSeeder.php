<?php

use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('locations')->delete();

        $locations = array(
            [
                'id' => 1,
                'name' => 'Стибера',
                'slug' => 'stibera',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id' => 2,
                'name' => 'Маркови кули',
                'slug' => 'markovi-kuli',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id' => 3,
                'name' => 'Кале, Св. Спас',
                'slug' => 'kale-sv-spas',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id' => 4,
                'name' => 'Скопски Аквадукт',
                'slug' => 'skopski-akvadukt',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id' => 5,
                'name' => 'Залив на Коските',
                'slug' => 'zaliv-na-koskite',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id' => 6,
                'name' => 'Хераклеа Линкестис',
                'slug' => 'heraklea-linkestis',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id' => 7,
                'name' => 'Stobi',
                'slug' => 'stobi',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id' => 8,
                'name' => 'Опсерваторија Кокино',
                'slug' => 'opservatorija-kokino',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id' => 9,
                'name' => 'Тумба',
                'slug' => 'tumba',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            
        );

        // Uncomment the below to run the seeder
        DB::table('locations')->insert($locations);
    }
}
