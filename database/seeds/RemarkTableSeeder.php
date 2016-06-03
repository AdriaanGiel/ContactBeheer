<?php

use Illuminate\Database\Seeder;
use App\Remark;

class RemarkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Remark::create([
            'opmerking' => "ff testen of het werkt",
            'contact_id' => 1,
            'user_id' => 1
        ]);
    }
}
