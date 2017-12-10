<?php

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord {

    public function rules()
    {
        return [
            ['title', 'string']
        ];
    }


    public static function getSubCategories($categoryId)
    {
        $subCategories = [];

        if ($categoryId) {
            $subCategories = self::find()
                ->where(['category_id' => $categoryId])
                ->asArray()
                ->all();
        }

        return $subCategories;
    }
}