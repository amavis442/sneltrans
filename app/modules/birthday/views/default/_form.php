<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use dosamigos\fileupload\FileUploadUI;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Birthday */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="birthday-form">
    <div>
        <?=Html::errorSummary($model); ?>
        
    </div>
<?php 
$form = ActiveForm::begin([
    'options'=>['enctype'=>'multipart/form-data'] // important
]);
?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?php
    echo $form->field($model, 'image')->widget(FileInput::classname(), [
        'options'=>['accept'=>'image/*'],
        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']]
        ]);
    ?>
    
    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>
    
    <?=Html::label('Birthdate');?><br/>
    <?=DatePicker::widget([
        'model' => $model,
        'attribute' => 'birthdate',
        //'language' => 'nl',
        //'dateFormat' => 'dd-MM-yyyy',
        ]); ?>
    <br/>
    <?=Html::label('Date of death');?><br/>
    <?=DatePicker::widget([
        'model' => $model,
        'attribute' => 'dateofdeath',
        //'language' => 'nl',
        //'dateFormat' => 'dd-MM-yyyy',
        ]); ?>
    <br/>
    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
