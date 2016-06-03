<?php

use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            'straat' => 'Westerbeekstraat',
            'huisnummer' => 8,
            'toevoeging' => 'B',
            'postcode' => '3074DN',
            'plaats' => 'Rotterdam'
        ]);

        DB::table('addresses')->insert([
            'straat' => 'posthumalaan',
            'huisnummer' => 9,
            'toevoeging' => 'A',
            'postcode' => '3074DG',
            'plaats' => 'Rotterdam'
        ]);
    }
}
