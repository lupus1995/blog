<?php

namespace app\controllers;

use app\models\Posts;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

class PostsController extends ActiveController
{
    public $modelClass = Posts::class;

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex($categoryId)
    {
        return new ActiveDataProvider([
            'query' => Posts::find()->where(['categoryId' => $categoryId]),
            'pagination' => ['defaultPageSize' => 5, ],
        ]);
    }
}
