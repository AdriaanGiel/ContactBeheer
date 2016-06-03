<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(RelationTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(ContactUserTableSeeder::class);
        $this->call(AddressContactTableSeeder::class);
        $this->call(EmailTableSeeder::class);
        $this->call(PhonenumberTableSeeder::class);
        $this->call(BanknumberTableSeeder::class);
        $this->call(RemarkTableSeeder::class);

    }
}
