<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/9
 * Time: 16:33
 */

namespace frontend\controllers;


use frontend\controllers\base\BaseController;

class ArticleController extends BaseController
{
    /**
     * 文章首页
     * @return string
     */
   public function actionIndex()
   {
       return $this->render('index');
   }

    public function actionAdd()
    {

    }

}