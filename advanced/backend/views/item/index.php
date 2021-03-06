<?php

use backend\component\widget\linkPages;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '角色&权限列表';
$this->params['breadcrumbs'][] = $this-> title;

$this->registerJsFile('/statics/js/table_base.js',[ 'depends'=> 'backend\assets\AppAsset']);
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>角色&权限列表</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">主页</a>
            </li>
            <li>
                <a>系统用户</a>
            </li>
            <li>
                <strong>角色</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">



<div class="auth-item-model-index">

    <div class ="search-container" >
        <?=Html::a("创建 <i class='icon-plus'></i>" , ['create' ], ['class' => 'btn btn-success btn-new green']) ?>
        <form action ="" class="form-search pull-right" >
            <div class ="input-append" >
                <select name ="type" class="search-option">
                    <option value ="name">名称</ option>
                </select >
                <input name ="value" class="m-wrap" type="text" placeholder= "请输入搜索内容" >
                <button class ="btn green" type= "submit">搜索</button >
            </div >
        </form >
    </div >

    <div class="summary">

        <?=Yii::t('common' , '{start}-{end} a total of {total}',['start' => $data[ 'start'], 'end'=> $data['end'],'total'=> $data['count' ]])?> </div >

    <table class ="table table-striped table-bordered table_base">
        <thead >
        <tr >
            <!--                 <th> -->
            <!--                     <div class="checker"><span><input type="checkbox" value="1" name="select_all" class="select-on-check-all"></span></div> -->
            <!--                 </th> -->
            <th ># </th >
            <th >名称 </th >
            <th >类型 </th >
            <th >描述 </th >
            <th >创建时间 </th >
            <th >操作 </th >
        </tr >
        </thead >
        <tbody >
        <?php if ( empty($data[ 'data'])): ?>
        <tr ><td colspan ="20"><?=Yii::t('common' ,'Not find data') ?> </td ></tr >
        <?php else: ?>
            <?php $i = $data['start'];?>
            <?php foreach ( $data['data'] as $list):?>
        <tr data-key =" <?=$list[ 'name'] ?>" >
            <!--                 <td> -->
            <!--                     <div class="checker"><span><input type="checkbox" value="158" name="select"></span></div> -->
            <!--                 </td> -->
            <td ><?= $i++?> </td >
            <td ><?= Html::encode($list[ 'name']) ?></ td>
            <td ><?= Html::encode(($list[ 'type']==1)? '角色': '权限') ?></ td>
            <td ><?= Html::encode($list[ 'description']) ?></ td>
            <td> <?=Html:: encode($list['created_at']?date('Y-m-d',$list['created_at']):'未设置') ?></ td>
            <td >
                <a href= "<?= Url::to([ 'update', 'id'=>$list[ 'name']]); ?>" >编辑 </a >
                <a class ="del" href= "javascript:;">删除</a >
            </td >
        </tr >
        <?php endforeach; ?>
            <?php endif; ?>
        </tbody >
    </table >
    <?=LinkPages:: widget(['pagination' => $pages]);?>
    <input type ="hidden" name="delUrl" value= "<?= Url::to([ 'delete']) ?>" >
</div>
</div>