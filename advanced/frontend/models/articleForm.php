<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/9
 * Time: 17:41
 */

namespace frontend\models;


use yii\base\Model;

class ArticleForm extends Model
{
    public $id;
    public $title;
    public $content;
    public $label_img;
    public $cat_id;
    public $tags;

    /**
     * @return array
     */
    public function rules()
    {
       return [
           [['id','title','content','label_img','cat_id'], 'required'],
           [['cat_id', 'id'], 'integer'],
           ['title', 'string', 'min'=>4, 'max'=>30]

       ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id'        => 'ID',
            'title'     => '标题',
            'content'   => '文章内容',
            'cat_id'    => '分类',
            'label_img' => '标签图',
            'tags'      => '标签'

        ];
    }


}