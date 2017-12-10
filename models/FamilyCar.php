<?php

namespace app\models;

class FamilyCar extends Car {

    const TYPE = 'family';

    /**
     * @return CarQuery
     */
    public static function find()
    {
        return new CarQuery(get_called_class(), ['where' => ['type' => self::TYPE]]);
    }


    public function beforeSave($insert)
    {
        return parent::beforeSave($insert);
    }
}