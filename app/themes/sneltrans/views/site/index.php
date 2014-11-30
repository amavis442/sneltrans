<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Sneltrans';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <?php
            if (is_array($articles)):
                foreach ($articles as $article):
            ?>
            <div class="col-lg-4">

                <img alt="" src="<?= Yii::getAlias('@web'); ?>/images/transportation-wordpress-theme-320x107.jpg">

                <h2><?=$article->title;?></h2>

                <p><?=$article->teaser;?></p>

                <p><a class="btn btn-default" href="<?=Url::to(['article/view','id'=>$article->id]);?>"><?=Yii::t('app','Read more');?> &raquo;</a></p>
            </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>

    </div>
</div>

<div class='container-fluid scheidingbalk'>
        tussen balk
</div>

<div class="site-contact">
    <h1>Pakket opgeven</h1>
    <div class="row">
        <div class="col-lg-5">
            <?php
            $form = ActiveForm::begin(['id' => 'contact-form']);
            ?>
            <?= $form->field($model, 'name') ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'subject') ?>
            <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
            <?=
            $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            ])
            ?>
            <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


