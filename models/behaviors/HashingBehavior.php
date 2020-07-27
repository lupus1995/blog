<?php

namespace app\models\behaviors;

use Yii;
use yii\db\BaseActiveRecord;
use yii\base\InvalidCallException;
use yii\behaviors\AttributeBehavior;

class HashingBehavior extends AttributeBehavior
{
    /**
     * @var string the attribute that will receive timestamp value.
     * Set this property to false if you do not want to record the update time.
     */
    public $hashingAttribute = 'password';
    /**
     * {@inheritdoc}
     *
     * In case, when the value is `null`, the result of the PHP function [time()](https://secure.php.net/manual/en/function.time.php)
     * will be used as value.
     */
    public $value;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        if (empty($this->attributes)) {
            $this->attributes = [BaseActiveRecord::EVENT_BEFORE_INSERT => [
                $this->hashingAttribute,
            ]];
        }
    }

    /**
     * {@inheritdoc}
     *
     * In case, when the [[value]] is `null`, the result of the PHP function [time()](https://secure.php.net/manual/en/function.time.php)
     * will be used as value.
     */
    protected function getValue($event)
    {
        if ($this->value === null) {
            return Yii::$app->getSecurity()->generatePasswordHash($this->hashingAttribute);
        }

        return parent::getValue($event);
    }
}
