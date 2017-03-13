<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name', [
        'inputOptions'  => [
            'class' => 'update-style'
        ]
    ])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type',  [
        'inputOptions'  => [
            'class' => 'update-select-style'
        ]
    ] )->dropDownList(['1' =>'角色' ,'2' =>'权限' ])?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class ="form-group" >
        <?= Html::submitButton('保存' , ['class' =>'btn btn-success green']) ?>
    </div >

    <?php ActiveForm::end(); ?>

</div>
