<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\traits\Loadable;

class Product extends ActiveRecord {

    use Loadable;

    public function rules()
    {
        return [
            ['title', 'string'],
            [['title', 'category_id', 'sub_category_id'], 'required'],
            ['category_id', 'exist', 'targetAttribute' => 'id', 'targetClass' => 'app\models\Category'],
            ['sub_category_id', 'exist', 'targetAttribute' => 'id', 'targetClass' => 'app\models\Category'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'category_id'     => 'Category',
            'sub_category_id' => 'Sub category'
        ];
    }
}