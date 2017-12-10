<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 */
class Car extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'   => 'ID',
            'name' => 'Name',
            'type' => 'Type',
        ];
    }


    /**
     * @param array $row
     * @return Car|SportCar
     */
    public static function instantiate($row)
    {
        switch ($row['type'])
        {
            case SportCar::TYPE:
                return new SportCar();
            case FamilyCar::TYPE:
                return new FamilyCar();
            default:
                return new self;
        }
    }
}
