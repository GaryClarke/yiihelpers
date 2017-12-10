<?php

namespace app\models;

class SportCar extends Car {

    const TYPE = 'sports';

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