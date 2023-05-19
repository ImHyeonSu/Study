<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   #hasAttachmentsは後で追加された
        #Post::factory(3)->has(Attachment::factory()); or Post::factory(3)->hasAttachments();
        Blog::all()->each(function (Blog $blog) {
            Post::factory(3)->for($blog)->hasAttachments()->create();
        });
    }
}
