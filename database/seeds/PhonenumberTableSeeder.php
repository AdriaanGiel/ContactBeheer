<?php

use Illuminate\Database\Seeder;

class PhonenumberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phonenumbers')->insert([
            'telefoonnummer' => '0612324578',
            'contact_id' => '1'
        ]);
    }
}
