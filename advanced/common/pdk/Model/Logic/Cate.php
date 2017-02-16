<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/16
 * Time: 16:44
 */

namespace common\pdk\Model\Logic;


use common\pdk\Model\Dao\CateDao;

class Cate extends Logic
{
    /**
     * 获取分类列表
     * @return array
     * @throws \common\pdk\Model\Exception\CommonException
     */
    public static function getAllCats()
    {
        $cateList = [];

        $cate = CateDao::getList();
        if (!empty($cate))
        {
            foreach($cate as $k => $cat)
            {
                $cateList[$cat['id']]   = $cat['cat_name'];
            }

        } else {
            $cateList['0'] = '暂无分类';
        }

        return $cateList;
    }
}