<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/9
 * Time: 16:33
 */

namespace frontend\controllers;


use common\pdk\Model\Logic\Cate;
use frontend\controllers\base\BaseController;
use frontend\models\ArticleForm;

class ArticleController extends BaseController
{
    /**
     * 加载图片上传控件
     * @return array
     */
    public function actions()
    {
        return [
            'upload'=>[
                'class' => 'common\widgets\file_upload\UploadAction',     //这里扩展地址别写错
                'config' => [
                    'imagePathFormat' => "/static/images/upload/tags/{yyyy}{mm}{dd}/{time}{rand:6}",
                ]
            ],

            'ueditor'=>[
                'class' => 'common\widgets\ueditor\UEditorAction',
                'config'=>[
                    //上传图片配置
                    'imageUrlPrefix' => "", /* 图片访问路径前缀 */
                    'imagePathFormat' => "/static/images/ueditor/{yyyy}{mm}{dd}/{time}{rand:6}", /* 上传保存路径,可以自定义保存路径和文件名格式 */
                ]
            ]

        ];
    }

    /**
     * 文章首页
     * @return string
     */
   public function actionIndex()
   {
       return $this->render('index');
   }

    /**
     * 添加文章
     * @return string
     */
    public function actionAdd()
    {
        $model = new ArticleForm();
        $cate = Cate::getAllCats();

        return $this->render('add' ,['model'    => $model, 'cat'    =>$cate]);
    }

}