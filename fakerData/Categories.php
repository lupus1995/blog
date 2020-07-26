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

    private $translateCategories = [];

    public function getCategories()
    {
        return $this->categories;
    }

    public function getSlug()
    {
        $translationCategory = [];
        foreach ($this->categories as $category) {
            var_dump($category);
            var_dump(\yii\helpers\Inflector::slug($category));
        }
        $this->translateCategories = $translationCategory;
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
            var_dump($model->errors);
            var_dump($model->title);
        }
    }
}
