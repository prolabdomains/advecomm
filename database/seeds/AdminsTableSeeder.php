<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminData = array([
            'name' => 'Philip Otoo',
            'email' => 'admin1@localhost.test',
            'password' => Hash::make('123456'),
            'type' => 'admin',
            'mobile' => '024123456789',
            'image' => 'default.png',
            'status' => 1
        ],
        ['name' => 'Michael Quaye',
        'email' => 'admin2@localhost.test',
        'password' => Hash::make('123456'),
        'type' => 'admin',
        'mobile' => '027123456789',
        'image' => 'default.png',
        'status' => 1]);

        foreach($adminData as $key => $value)
        {
            Admin::create($value);
        }
    }
}
