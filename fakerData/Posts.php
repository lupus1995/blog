<?php

namespace app\fakerData;

use Faker\Factory;
use app\models\Categories;
use app\models\Posts as ModelsPosts;

class Posts
{
    /**
     *
     */
    public function generatedPost()
    {
        $faker = Factory::create();
        $categories = Categories::find()->all();
        foreach ($categories as $category) {
            for ($i = 0; $i < 5; $i++) {
                $post = new ModelsPosts;
                $post->title = $faker->company;
                $post->description = $faker->sentence($nbWords = 6, $variableNbWords = true);
                $post->image = $faker->imageUrl($width = 640, $height = 480);
                $post->categoryId = $category->id;
                $post->save();
                var_dump($post->title);
            }
        }
    }
}
