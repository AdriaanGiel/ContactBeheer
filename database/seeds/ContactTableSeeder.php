<?php

use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'voornaam' => 'Adriaan',
            'achternaam' => 'Giel',
            'geboortedatum' => '1991-10-15',
            'dag' => 15,
            'opnemen_kalender' => true,
            'relation_id' => '1'
        ]);
    }
}
