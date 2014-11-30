<?php

namespace app\modules\content\page\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionView($id)
    {
        return $this->render('view',['msg'=>'Fuck off']);
    }
}
