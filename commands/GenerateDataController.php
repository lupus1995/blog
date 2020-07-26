<?php

namespace app\commands;

use app\fakerData\Categories;
use yii\console\Controller;

class GenerateDataController extends Controller
{
    public function actionCategory()
    {
        $faker = new Categories();
        $faker->generatedCategories();
    }
}
