<?php

namespace app\commands;

use app\fakerData\Posts;
use yii\helpers\Console;
use yii\console\Controller;
use app\fakerData\Categories;
use app\fakerData\Comments;
use app\fakerData\User;

class GenerateDataController extends Controller
{
    /**
     * генерация данных для всего приложения
     */
    public function actionData()
    {
        $this->stdout("Генерация данных началась\n", Console::BOLD);
        $this->actionCategory();
        $this->actionPost();
        $this->actionComment();
        $this->actionUser();
        $this->stdout("Генерация данных закончилась\n", Console::BOLD);
    }

    /**
     * генерация данных для категорий
     */
    public function actionCategory()
    {
        $this->stdout("Генерация категорий\n", Console::BOLD);
        $faker = new Categories();
        $faker->generatedCategories();
        $this->stdout("Категории сгенерированы\n", Console::BG_GREEN);
    }

    /**
     * генерация данных для постов
     */
    public function actionPost()
    {
        $this->stdout("Генерация постов\n", Console::BOLD);
        $faker = new Posts;
        $faker->generatedPost();
        $this->stdout("Посты сгенерированы\n", Console::BG_GREEN);
    }

    /**
     * генерация данных для комментариев
     */
    public function actionComment()
    {
        $this->stdout("Генерация постов\n", Console::BOLD);
        $faker = new Comments;
        $faker->generatedComments();
        $this->stdout("Посты сгенерированы\n", Console::BG_GREEN);
    }

    /**
     * генерация пользователя
     */
    public function actionUser()
    {
        $this->stdout("Генерация пользователя\n", Console::BOLD);
        $faker = new User;
        $faker->generatedUser();
        $this->stdout("Пользователь сгенерированы\n", Console::BG_GREEN);
    }
}
