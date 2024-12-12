<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'The Rise of AI',
                'content' => 'Artificial intelligence is transforming the tech industry and beyond.',
            ],
            [
                'title' => '10 Healthy Living Tips',
                'content' => 'Explore practical tips to maintain a healthy lifestyle in a busy world.',
            ],
            [
                'title' => 'Exploring Paris',
                'content' => 'A travel guide to experiencing the best of Paris, from cuisine to culture.',
            ],
            [
                'title' => 'The Future of Education',
                'content' => 'How online learning platforms are revolutionizing traditional education.',
            ],
            [
                'title' => 'Latest Movie Reviews',
                'content' => 'Our take on the latest blockbusters and indie films worth watching.',
            ],
        ];

        foreach ($articles as $articleData) {
            $article = \App\Models\Article::create($articleData);

            $tags = \App\Models\Tags::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $article->tag()->attach($tags);
        }
    }
}
