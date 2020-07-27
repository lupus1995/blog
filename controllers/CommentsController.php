<?php

namespace app\controllers;

use Yii;
use app\models\Comments;
use yii\data\ActiveDataProvider;
use app\controllers\CommonController;

class CommentsController extends CommonController
{
    public $modelClass = Comments::class;

    public function actionIndex($postId)
    {
        return new ActiveDataProvider([
            'query' => Comments::find(['postId' => $postId]),
            'pagination' => ['defaultPageSize' => 5, ],
        ]);
    }

    public function actionUpdate($id)
    {
        $comments = Comments::findOne($id);
        if ($comments === null) {
            throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
        }
        $comments->load(Yii::$app->request->post(), '');
        $comments->save();
        return $comments;
    }
}
