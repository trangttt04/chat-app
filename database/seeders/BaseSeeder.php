<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{
    Social,
    Role,
};

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Role::insert([
             ['id' => 1, 'name' => 'Xác thực hai yếu tố'],
             ['id' => 2, 'name' => 'Xem trang cá nhân'],
             ['id' => 3, 'name' => 'Trạng thái hoạt động']
         ]);

         Social::insert([
             ['id' => 1, 'name' => 'Facebook'],
             ['id' => 2, 'name' => 'Twitter'],
             ['id' => 3, 'name' => 'Instagram'],
             ['id' => 4, 'name' => 'Youtube'],
             ['id' => 5, 'name' => 'Google']
         ]);
    }
}
