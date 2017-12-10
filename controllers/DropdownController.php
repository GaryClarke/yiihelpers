<?php

namespace app\controllers;

use yii\helpers\Json;
use app\models\Product;
use yii\web\Controller;
use app\models\Category;

class DropdownController extends Controller {


    public function actionGetSubCategories($id)
    {
        if (request()->isAjax) {

            return Json::encode(Category::getSubCategories($id));
        }

        abort(403, 'Only ajax is allowed');
    }


    public function actionIndex()
    {
        $model = new Product();

        if ($model->validateLoad()) {
            app()->session->setFlash('success', 'Model was successfully saved');
        }

        return $this->render('index', compact('model'));
    }
}