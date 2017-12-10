<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\DeliveryForm;

class ValidationController extends Controller {

    public function actionIndex()
    {
        $model = new DeliveryForm();

        if ($model->validateLoad()) {

            app()->session->setFlash('success',
                'The form was successfully processed!'
            );
        }

        return $this->render('index', compact('model'));
    }
}