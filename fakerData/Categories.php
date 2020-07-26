<?php

namespace app\fakerData;

use app\models\Categories as ModelsCategories;

/**
 * класс для генерации
 */
class Categories
{
    /**
     * название категорий по умолчанию
     */
    private $categories = [
        'Природа',
        'Города',
        'Работа',
        'Отдых',
        'Животные'
    ];

    /**
     * генерация категорий
     * @var string $category
     * @var app\models\Categories $model
     */
    public function generatedCategories()
    {
        foreach ($this->categories as $category) {
            $model = new ModelsCategories();
            $model->title = $category;
            $model->slug = \yii\helpers\Inflector::slug($category);
            $model->save();
        }
    }
}
