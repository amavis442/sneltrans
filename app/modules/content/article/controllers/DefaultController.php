<?php

namespace app\modules\content\article\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionView($id)
    {
        return $this->render('view',['msg'=>'Dit is een bereicht']);
    }
}
