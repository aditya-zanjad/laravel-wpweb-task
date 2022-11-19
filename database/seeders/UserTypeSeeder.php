<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userTypes = [
            [
                'name' => 'admin'
            ],
            [
                'name' => 'developer'
            ]
        ];

        foreach ($userTypes as $type) {
            UserType::create($type);
        }
    }
}
