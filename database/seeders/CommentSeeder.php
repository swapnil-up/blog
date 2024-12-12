<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sampleComments = [
            "This article is very insightful, I learned a lot!",
            "I totally agree with this point, it’s so well explained.",
            "Great read! I think this will really help others.",
            "I have a different perspective on this, but I appreciate the article.",
            "This was a bit too long for me, but still valuable.",
            "Does anyone else have experience with this? I’d love to discuss more.",
            "I love how detailed this article is, very helpful!",
            "Not sure I agree with this, but it’s interesting to hear other views.",
            "I’m sharing this with my colleagues, great information!",
            "This is a timely article, I was just looking for something like this."
        ];

        $articles=Article::all();
        foreach($articles as $article){
            for($i=0;$i<3;$i++){
                Comment::create([
                    'article_id'=>$article->id,
                    'author'=>'user '.rand(1,100),
                    'content'=>$sampleComments[array_rand($sampleComments)],
                ]);
            }
        }

    }
}
