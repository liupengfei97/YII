<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/16
 * Time: 11:19
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '文章';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label'   => '添加', 'url'  => ['article/index']];

?>

<div class="row">
    <div class="col-lg-9">
        <div class="panel-title box-title">
            <span>创建文章</span>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'title')->textInput(['maxlength'   => true]) ?>

            <?= $form->field($model, 'cat_id')->dropDownList($cat) ?>

            <?= $form->field($model, 'content')->widget('common\widgets\ueditor\UEditor',[
                'clientOptions'=>[
                    //编辑区域大小
                    'initialFrameHeight' => '200',
                    //设置语言
                    'lang' =>'en', //中文为 zh-cn
                    //定制菜单
                    'toolbars' => [
                        [
                            'fullscreen', 'source', 'undo', 'redo', '|',
                            'fontsize',
                            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat',
                            'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|',
                            'forecolor', 'backcolor', '|',
                            'lineheight', '|',
                            'indent', '|'
                        ],
                    ]
                ]
            ]) ?>

            <?= $form->field($model, 'label_img')->widget('common\widgets\file_upload\FileUpload',[
                'config'=>[]
            ]) ?>

            <?= $form->field($model, 'tags')->widget('common\widgets\tags\TagWidget') ?>

            <div class="form-group">
                <?= Html::submitButton('发布', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel-title box-title">
            <span>注意事项</span>
        </div>
        <div class="panel-body">
            <p>华盛顿粉红色的合肥市东方红</p>
            <p>水电费是的发送到发送到分的是</p>
            <p>是的发送到发送到发送到</p>
        </div>

    </div>
</div>
