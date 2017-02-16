<?php
/**
 * 公用Exception类
 *
 * @author WSR
 * @date 2016/5/7 13:07
 */

namespace common\pdk\Model\Exception;


use yii\base\Exception;

class CommonException extends Exception
{

    /**
     * @var array the error info provided by a PDO exception. This is the same as returned
     * by [PDO::errorInfo](http://www.php.net/manual/en/pdo.errorinfo.php).
     */
    public $errorInfo = [];


    /**
     * CommonException constructor.
     * @param string $message
     * @param array $errorInfo
     * @param int $code
     * @param \Exception|null $previous
     */
    public function __construct($message, $errorInfo = [], $code = 0, \Exception $previous = null)
    {
        $this->errorInfo = $errorInfo;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Database Exception';
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return parent::__toString() . PHP_EOL
        . 'Additional Information:' . PHP_EOL . print_r($this->errorInfo, true);
    }
}