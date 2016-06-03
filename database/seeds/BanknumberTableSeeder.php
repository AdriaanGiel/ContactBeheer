<?php

use Illuminate\Database\Seeder;

class BanknumberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banknumbers')->insert([
            'banknummer' => '0123468799',
            'contact_id' => '1'
        ]);
    }
}
