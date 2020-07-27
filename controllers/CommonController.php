<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBearerAuth;

class CommonController extends ActiveController
{
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index'], $actions['update']);
        return $actions;
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['except'] = ['index'];
        $behaviors['authenticator']['authMethods'] = [HttpBearerAuth::class];
        return $behaviors;
    }
}
