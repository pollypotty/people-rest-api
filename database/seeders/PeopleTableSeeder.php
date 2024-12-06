<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // check if the table is empty
        if (Person::count() > 0) {
            $this->command->info('The people table is already populated. Skipping import.');
            return;
        }

        // define the XML file path
        $filePath = base_path('people.xml');

        // check if the file exists
        if (!file_exists($filePath)) {
            $this->command->error('XML file not found at ' . $filePath);
            return;
        }

        // load the XML file
        $xml = simplexml_load_file($filePath);

        // insert data from XML into the database
        foreach ($xml->person as $person) {
            $data = [
                'name' => (string) $person->name,
                'email' => (string) $person->email,
                'dept' => (string) $person->dept,
                'rank' => (string) $person->rank,
                'phone' => (string) $person->phone,
                'room' => (string) $person->room,
            ];

            Person::create($data);
        }

        $this->command->info('Data imported successfully from XML.');
    }
}
