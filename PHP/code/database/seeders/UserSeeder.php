<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**説明ーデータを作ってデータベース入れるファイル
     * php artisan:seeder UserSeeder
     * 仮想サーバーでphp artisan db:seed
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();
        User::factory()->unverified()->create();
    }
}
