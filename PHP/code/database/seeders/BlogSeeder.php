<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   #説明ーuserを読んでblogを作るファイル
        #$user->blogs()->saveMany(Blogs::factory()->make());
        #Blog::factory()->for($user)->create();
        #        User::all()->each(function(User $user){
        #            Blog::factory()->for($user)->create();
        #                    });
        User::all()->each(function (User $user) {
            #説明ーブログの主人以外の３人を呼び出す
            $subscribers = User::whereNot('id', $user->id)->get()->random(3);
            #use App\Models\Blogにあるsubscribersの関係を呼び出す。
            Blog::factory()->for($user)->hasAttached(
                factory: $subscribers,
                relationship: 'subscribers'
            )->create();
            /**
             * Blog::factory()->for($user)->create()
             *      ->subscribers()
             *      ->sync($subscribers);
             */

            //Blog::factory()->for($user)->create()
            //    ->subscribers()
            //    ->sync($subscribers);
        });
    }
}
