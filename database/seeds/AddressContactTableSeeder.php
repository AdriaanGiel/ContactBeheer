<?php

use Illuminate\Database\Seeder;

class AddressContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('address_contact')->insert([
            'address_id' => '1',
            'contact_id' => '1'
        ]);

        DB::table('address_contact')->insert([
            'address_id' => '2',
            'contact_id' => '1'
        ]);
    }

}
