<?php

namespace app\models;

use yii\base\Model;
use app\components\WordsValidator;

class Article extends Model {

    public $title;

    public function rules()
    {
        return [
            ['title', 'string'],
            ['title', WordsValidator::className(), 'size' => 10],
        ];
    }
}