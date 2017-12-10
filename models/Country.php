<?php

namespace app\models;

use app\exceptions\ModelNotFoundException;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "country".
 *
 * @property string $code
 * @property string $name
 * @property int $population
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['population'], 'integer'],
            [['code'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 52],
            [['code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'name' => 'Name',
            'population' => 'Population',
        ];
    }


    /**
     * Handles not found cases
     *
     * @param $condition
     * @return null|static
     * @throws ModelNotFoundException
     */
    public static function findOrDie($condition)
    {
        if ($country = self::findOne($condition)) {

            return $country;
        }

        $message = 'A model of type ' . static::class . ' could not be found using the identifier or condition you provided';

        throw new ModelNotFoundException($message);
    }
}
