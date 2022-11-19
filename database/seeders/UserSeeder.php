<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userTypeAdmin = UserType::where('name', 'admin')
            ->select(['id', 'name'])
            ->first();

        $encryptedPassword = bcrypt(987654321);

        $adminUsers = [
            [
                'name'          => 'Admin - 1',
                'email'         => 'admin1@email.com',
                'password'      =>  $encryptedPassword,
                'user_type_id'  =>  $userTypeAdmin->id
            ],
            [
                'name'          => 'Admin - 2',
                'email'         => 'admin2@email.com',
                'password'      =>  $encryptedPassword,
                'user_type_id'  =>  $userTypeAdmin->id
            ],
            [
                'name'          => 'Admin - 3',
                'email'         => 'admin3@email.com',
                'password'      =>  $encryptedPassword,
                'user_type_id'  =>  $userTypeAdmin->id
            ],
        ];

        foreach ($adminUsers as $adminUser) {
            User::create($adminUser);
        }
    }
}
