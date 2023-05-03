<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //  DB::table('users')->insert(array(
       //   array(
       //     'name' => 'Admin',
       //     'email' => 'admin@gmail.com',
       //     'password' => '$2y$10$jYRXhZ8MKAMpNMDU0volkOtVdX9Yru6gczrPR7dih1WDe3zDWdtE2',
       //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
       //      'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
       //   ),
       //   array(
       //     'name' => 'Client',
       //     'email' => 'client@gmail.com',
       //     'password' => '$2y$10$jYRXhZ8MKAMpNMDU0volkOtVdX9Yru6gczrPR7dih1WDe3zDWdtE2',
       //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
       //      'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
       //   )
       // ));
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$jYRXhZ8MKAMpNMDU0volkOtVdX9Yru6gczrPR7dih1WDe3zDWdtE2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $admin->assignRole('admin');
    }
}
