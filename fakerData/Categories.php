<?php

namespace app\fakerData;

use app\models\Categories as ModelsCategories;

class Categories
{
    private $categories = [
        'Природа',
        'Города',
        'Работа',
        'Отдых',
        'Животные'
    ];

    public function getCategories()
    {
        return $this->categories;
    }

    /**
     *
     */
    public function generatedCategories()
    {
        foreach ($this->categories as $category) {
            $model = new ModelsCategories();
            $model->title = $category;
            $model->slug = \yii\helpers\Inflector::slug($category);
            // $model->timestamp->touch();
            $model->save();
        }
    }
}
