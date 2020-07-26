<?php

namespace app\controllers;

use app\models\Categories;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

class CategoriesController extends ActiveController
{
    public $modelClass = Categories::class;

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex()
    {
        return new ActiveDataProvider([
            'query' => Categories::find(),
            'pagination' => ['defaultPageSize' => 1, ],
        ]);
    }
}
