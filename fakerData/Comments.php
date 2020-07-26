<?php

namespace app\fakerData;

use Faker\Factory;
use app\models\Posts;
use app\models\Comments as ModelsComments;

class Comments
{
    /**
     * генерация комментариев;
     * @var Faker\Factory $faker;
     * @var app\models\Posts $posts;
     * @var app\models\Posts $post;
     * @var app\models\Comments $comment;
     */
    public function generatedComments()
    {
        $faker = Factory::create();
        $posts = Posts::find()->all();
        foreach ($posts as $post) {
            for ($i = 0; $i < 5; $i++) {
                $comment = new ModelsComments();
                $comment->postId = $post->id;
                $comment->text = $faker->text;
                $comment->save();
            }
        }
    }
}
