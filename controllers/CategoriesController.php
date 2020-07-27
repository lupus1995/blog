<?php

namespace app\controllers;

use app\models\Categories;
use app\models\Comments;
use Yii;
use yii\data\ActiveDataProvider;

class CategoriesController extends CommonController
{
    public $modelClass = Categories::class;

    public function actionIndex()
    {
        return new ActiveDataProvider([
            'query' => Categories::find(),
            'pagination' => ['defaultPageSize' => 5, ],
        ]);
    }

    public function actionUpdate($id)
    {
        $categories = Categories::findOne($id);
        if ($categories === null) {
            throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
        }
        $categories->load(Yii::$app->request->post(), '');
        $categories->save();
        return $categories;
    }
}
