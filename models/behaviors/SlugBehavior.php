<?php

namespace app\models\behaviors;

use yii\db\BaseActiveRecord;
use yii\behaviors\AttributeBehavior;

class SlugBehavior extends AttributeBehavior
{
    /**
     * @var string the attribute that will receive timestamp value.
     * Set this property to false if you do not want to record the update time.
     */
    public $slugAttribute = 'slug';
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
            $this->attributes = [
                BaseActiveRecord::EVENT_BEFORE_INSERT => $this->slugAttribute,
                BaseActiveRecord::EVENT_BEFORE_UPDATE => $this->slugAttribute,
            ];
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
            return \yii\helpers\Inflector::slug($this->owner->title);
        }

        return parent::getValue($event);
    }
}
