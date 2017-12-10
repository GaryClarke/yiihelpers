<?php

namespace app\actions;

use yii\base\Action;

class CreateAction extends Action {

    public $modelClass;

    public function run()
    {
        $model = new $this->modelClass();

        if ($model->load(request()) && $model->save()) {

            $this->controller->redirect(['view', 'id' => $model->getPrimaryKey()]);

        } else {

            return $this->controller->render('//crud/create', compact('model'));
        }
    }
}