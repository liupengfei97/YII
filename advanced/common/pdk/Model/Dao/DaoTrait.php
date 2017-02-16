<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/16
 * Time: 16:27
 */

namespace common\pdk\Model\Dao;


use common\pdk\Model\Exception\CommonException;
use Yii;
use yii\db\Exception;
use yii\db\Expression;
use yii\db\Query;

trait DaoTrait
{
    public static $DB = '';
    public static $TB = '';

    /**
     *
     * @param string $fields
     * @param array $conditions
     * @param array $orderBy
     * @return array|bool
     * @throws CommonException
     */
    public static function getOne($fields = '*', $conditions = [], $orderBy = [])
    {
        try
        {
            $fields = empty($fields) ? '*' : $fields;

            $model = (new Query())->select($fields)->from(static::$TB);

//            if (!empty($conditions))
//            {
//                $model->where($conditions);
//            }

            /**
             * 示例
             * $conditions = [
             *  ['name' => 'admin'],
             *  ['<', 'age', 20]
             * ]
             */
            if (!empty($conditions))
            {
                foreach ($conditions as $condition)
                {
                    $model->andWhere($condition);
                }
            }

            if (!empty($orderBy))
            {
                $model->orderBy($orderBy);
            }

            return $model->one();

        } catch (CommonException $e)
        {
            throw  new CommonException($e->getMessage(), $e->errorInfo, $e->getCode());
        }

    }


    /**
     *
     * @param string $fields
     * @param array $conditions | [['name' => 'admin'], ['<', 'age', 20]]
     * @param array $orderBy
     * @param int $offset
     * @param int $limit
     * @return array
     * @throws CommonException
     */
    public static function getList($fields = '*', $conditions = [], $orderBy = [], $offset = 0, $limit = 10)
    {
        try
        {

            $fields = empty($fields) ? '*' : $fields;

            $model = (new Query())->select($fields)->from(static::$TB);

            /**
             * 示例
             * $conditions = [
             *  ['name' => 'admin'],
             *  ['<', 'age', 20]
             * ]
             */
            if (!empty($conditions))
            {
                foreach ($conditions as $condition)
                {
                    $model->andWhere($condition);
                }
            }

            if (!empty($orderBy))
            {
                $model->orderBy($orderBy);
            }

            $model->offset(max(0, $offset));

            $model->limit(max(1, $limit));

            return $model->all();

        } catch (CommonException $e)
        {
            throw  new CommonException($e->getMessage(), $e->errorInfo, $e->getCode());
        }

    }

    /**
     * @param array $conditions
     * @return int|string
     * @throws CommonException
     */
    public static function getCount($conditions = [])
    {
        try
        {
            $model = (new Query())->from(static::$TB);

            /**
             * 示例
             * $conditions = [
             *  ['name' => 'admin'],
             *  ['<', 'age', 20]
             * ]
             */
            if (!empty($conditions))
            {
                foreach ($conditions as $condition)
                {
                    $model->andWhere($condition);
                }
            }

            return $model->count();

        } catch (CommonException $e)
        {
            throw  new CommonException($e->getMessage(), $e->errorInfo, $e->getCode());
        }
    }

    /**
     * 验证是否存在
     *
     * @param array $conditions
     * @return bool
     * @throws CommonException
     */
    public static function isExists($conditions = [])
    {
        try
        {
            $model = (new Query())->from(static::$TB);

            /**
             * 示例
             * $conditions = [
             *  ['name' => 'admin'],
             *  ['<', 'age', 20]
             * ]
             */
            if (!empty($conditions))
            {
                foreach ($conditions as $condition)
                {
                    $model->andWhere($condition);
                }
            }

            return $model->exists();

        } catch (CommonException $e)
        {
            throw  new CommonException($e->getMessage(), $e->errorInfo, $e->getCode());
        }
    }


    /**
     * 保持数据并返回最后插入的ID
     *
     * @param array $data
     * @return bool|string
     * @throws \yii\db\Exception
     */
    public static function saveData($data = [])
    {
        if (empty($data))
            return false;

        $connection = Yii::$app->db;
        $connection->createCommand()->insert(static::$TB, $data)->execute();
        return $connection->getLastInsertID();
    }

    /**
     *
     * @param $columns
     * @param string $condition
     * @param array $params
     * @return bool|int
     * @throws \yii\db\Exception
     */
    public static function updateData($columns, $condition = '', $params = [])
    {
        if (empty($columns) || empty($condition))
            return false;

        try {
            $connection = Yii::$app->db->createCommand();
            $connection->update(static::$TB, $columns, $condition, $params);
            return $connection->execute(); // 返回影响的行数
        }
        catch (Exception $e)
        {
            return false;
        }
    }

    /**
     * 字段自增
     *
     * @param null $field
     * @param null $number
     * @param null $condition
     * @param array $params
     * @return bool|int
     */
    public static function increment($field = null, $number = null, $condition = null, $params = [])
    {
        if (empty($field) || empty($number) || empty($condition))
            return false;

        $connection = Yii::$app->db->createCommand();
        $connection->update(static::$TB, [$field => new Expression($field . '+' . $number)], $condition, $params);
        return $connection->execute(); // 返回影响的行数
    }

    /**
     * 字段自减
     *
     * @param null $field
     * @param null $number
     * @param null $condition
     * @param array $params
     * @return bool|int
     */
    public static function decrement($field = null, $number = null, $condition = null, $params = [])
    {
        if (empty($field) || empty($number) || empty($condition))
            return false;

        $connection = Yii::$app->db->createCommand();
        $connection->update(static::$TB, [$field => new Expression($field . '-' . $number)], $condition, $params);
        return $connection->execute(); // 返回影响的行数
    }

    /**
     * 根据条件获取单个字段值
     *
     * @param string $fieldName
     * @param array $conditions
     * @param array $orderBy
     * @return bool|string
     * @throws CommonException
     */
    public static function getField($fieldName = '', $conditions = [], $orderBy = [])
    {
        try
        {
            if (empty($fieldName) || empty($conditions))
                return false;

            $model = (new Query())->select($fieldName)->from(static::$TB);

            /**
             * 示例
             * $conditions = [
             *  ['name' => 'admin'],
             *  ['<', 'age', 20]
             * ]
             */
            if (!empty($conditions))
            {
                foreach ($conditions as $condition)
                {
                    $model->andWhere($condition);
                }
            }

            if (!empty($orderBy))
            {
                $model->orderBy($orderBy);
            }

            return $model->scalar();

        } catch (CommonException $e)
        {
            throw  new CommonException($e->getMessage(), $e->errorInfo, $e->getCode());
        }
    }
}