<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/16
 * Time: 16:25
 */

namespace common\pdk\Model\Dao;


use yii\base\Model;

class BaseDao extends Model
{
    /**
     * @var string
     */
    protected $tabPrefix = '';

    use DaoTrait;

}