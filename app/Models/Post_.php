<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Darlian Ramadhani",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae voluptatibus totam praesentium atque nemo amet. Aspernatur nihil vel laborum similique dolorum nesciunt velit aperiam error quas placeat, soluta necessitatibus recusandae quidem mollitia, nostrum id perferendis iure odio veritatis in doloremque! Maiores expedita aliquid sit sunt cupiditate est corporis eaque atque facere error illo iste, inventore facilis voluptate neque itaque dolores accusamus harum deleniti non architecto aliquam ad! Tempora, maxime commodi impedit dicta itaque obcaecati, dignissimos odio optio fugit ab maiores."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Darlian Ramadhani",
            "body" => "haha Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae voluptatibus totam praesentium atque nemo amet. Aspernatur nihil vel laborum similique dolorum nesciunt velit aperiam error quas placeat, soluta necessitatibus recusandae quidem mollitia, nostrum id perferendis iure odio veritatis in doloremque! Maiores expedita aliquid sit sunt cupiditate est corporis eaque atque facere error illo iste, inventore facilis voluptate neque itaque dolores accusamus harum deleniti non architecto aliquam ad! Tempora, maxime commodi impedit dicta itaque obcaecati, dignissimos odio optio fugit ab maiores."
        ],
    ];

    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);

    //     $post = [];
    //     foreach($posts as $p){
    //         if($p["slug"] === $slug){
    //             $post = $p;
    //         }
    //     }
    //     return $post;


    }

}
