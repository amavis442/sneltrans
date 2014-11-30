<?php

namespace app\modules\content\article;


class article extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\content\article\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public function getArticle($id)
    {
        return \app\modules\content\article\models\Article::findOne($id);
    }
}
