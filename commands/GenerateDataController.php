<?php

namespace app\commands;

use app\fakerData\Categories;
use app\fakerData\Posts;
use yii\console\Controller;

class GenerateDataController extends Controller
{
    public function actionCategory()
    {
        $faker = new Categories();
        $faker->generatedCategories();
    }

    public function actionPost()
    {
        $faker = new Posts;
        $faker->generatedPost();
    }
}
