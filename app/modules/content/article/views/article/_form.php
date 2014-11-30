<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\content\article\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'teaser')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'author')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'draft' => 'Draft', 'hidden' => 'Hidden', 'public' => 'Public', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_at')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput(['readonly' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
