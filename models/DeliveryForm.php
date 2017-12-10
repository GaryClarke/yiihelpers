<?php

namespace app\models;

use yii\base\Model;
use app\models\traits\Loadable;

class DeliveryForm extends Model {

    use Loadable;

    const TYPE_PICKUP = 1;
    const TYPE_COURIER = 2;

    public $type;
    public $address;


    public function rules()
    {
        return [
            ['type', 'required'],
            ['type', 'in', 'range' => [self::TYPE_PICKUP, self::TYPE_COURIER]],
            ['address', 'required', 'when' => function($model) {
                return $model->type == self::TYPE_COURIER;
            }, 'whenClient' => "function() {
                return $('#deliveryform-type').val() == '" . self::TYPE_COURIER . "';
            }"]
        ];
    }


    public function typeList()
    {
        return [self::TYPE_PICKUP => 'Pickup', self::TYPE_COURIER => 'Courier'];
    }
}