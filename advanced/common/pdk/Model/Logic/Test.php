<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/17
 * Time: 12:22
 */

namespace common\pdk\Model\Logic;


use yii\base\Object;

class Test extends Object
{
    /**
     * @var
     */
    private $_title;

    /**
     * @param $title
     * @return string
     */
    public function setTitle($title)
    {
        return $this->_title = trim($title);
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }


}