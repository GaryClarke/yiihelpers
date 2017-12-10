<?php

namespace app\models;

use app\models\traits\Loadable;
use yii\base\Model;

class EntryForm extends Model {

    use Loadable;

    public $name;
    public $email;

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email']
        ];
    }
}