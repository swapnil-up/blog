<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Tags;

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        $articles = Article::all();

        foreach ($articles as $article) {
            $tags = Tags::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $article->tag()->attach($tags);
        }
    }
}
