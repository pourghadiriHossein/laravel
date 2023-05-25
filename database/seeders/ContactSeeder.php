<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [
            [
                'user_id' => null,
                'name' => 'علی ابراهیمی',
                'phone' => '093355587960',
                'email' => 'test1@test.com',
                'description' => 'تماس با ما آزمایشی',
            ],
            [
                'user_id' => 1,
                'name' => 'حسین پورقدیری',
                'phone' => '093355587960',
                'email' => 'test1@test.com',
                'description' => 'تماس با ما آزمایشی',
            ],
            [
                'user_id' => null,
                'name' => 'سهیل ابراهیمی',
                'phone' => '093355587960',
                'email' => 'test1@test.com',
                'description' => 'تماس با ما آزمایشی',
            ],
        ];
        Contact::insert($contacts);
    }
}
