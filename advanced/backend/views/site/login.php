<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/24
 * Time: 16:51
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '后台登录';

?>


<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">blog</h1>

        </div>
        <h3>后台登录</h3>
        <?php $form = ActiveForm::begin([
            'id'        => 'login-form',
            'method'    => 'post',
            'options'   => ['class' => 'm-t', 'role' => 'form'],
        ]); ?>

        <div class="form-group">
            <?= $form->field($model, 'username', [
                'inputOptions'  => [
                    'placeholder' => '用户名',
                    'autofocus' => true,
                    'class' => 'form-control'
                ]
            ])->textInput()->label(false) ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'password', [
                'inputOptions'  => [
                    'placeholder' => '密码',
                    'class' => 'form-control'
                ]
            ])->passwordInput(['class' => 'form-control'])->label(false) ?>
        </div>

        <?= Html::submitButton('登录', ['class' => 'btn btn-primary block full-width m-b', 'name' => 'login-button']) ?>

        <p class="text-muted text-center"> <a href="login.html#"><small>忘记密码了？</small></a> | <a href="register.html">注册一个新账号</a>
        </p>
        <?php ActiveForm::end()?>

    </div>
</div>

