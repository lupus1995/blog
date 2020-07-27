<?php

namespace app\controllers;

use Yii;
use app\models\Posts;
use yii\data\ActiveDataProvider;

class PostsController extends CommonController
{
    public $modelClass = Posts::class;

    public function actionIndex($categoryId)
    {
        return new ActiveDataProvider([
            'query' => Posts::find()->where(['categoryId' => $categoryId]),
            'pagination' => ['defaultPageSize' => 5, ],
        ]);
    }

    public function actionUpdate($id)
    {
        $post = Posts::findOne($id);
        if ($post === null) {
            throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
        }
        $post->load(Yii::$app->request->post(), '');
        $post->save();
        return $post;
    }
}
