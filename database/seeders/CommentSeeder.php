<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = [
            [
                'user_id' => 1,
                'product_id' => 1,
                'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
            ],
            [
                'user_id' => 1,
                'product_id' => 2,
                'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
            ],
            [
                'user_id' => 1,
                'product_id' => 3,
                'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
            ],
            [
                'user_id' => 1,
                'product_id' => 4,
                'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
            ],
            [
                'user_id' => 1,
                'product_id' => 5,
                'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
            ],
            [
                'user_id' => 1,
                'product_id' => 6,
                'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
            ],
            [
                'user_id' => 1,
                'product_id' => 7,
                'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
            ],
            [
                'user_id' => 1,
                'product_id' => 8,
                'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
            ],
            [
                'user_id' => 1,
                'product_id' => 9,
                'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
            ],
            [
                'user_id' => 1,
                'product_id' => 10,
                'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
            ],
            [
                'user_id' => 1,
                'product_id' => 11,
                'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
            ],
            [
                'user_id' => 1,
                'product_id' => 12,
                'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
            ],
            [
                'user_id' => 1,
                'product_id' => 13,
                'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
            ],
            [
                'user_id' => 1,
                'product_id' => 14,
                'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
            ],
            [
                'user_id' => 1,
                'product_id' => 15,
                'description' => 'جنس مرغوب! همینه که هست؛ میخوای بخا نمیخوای نخا',
            ],
        ];
        Comment::insert($comments);
    }
}
