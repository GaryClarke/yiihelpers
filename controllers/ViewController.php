<?php

namespace app\controllers;

use yii\web\Controller;

class ViewController extends Controller {

    public $pageTitle;

    public function actionIndex()
    {
        $this->pageTitle = 'Controller context test';

        return $this->render('index');
    }


    public function hello()
    {
//        if (request()->get('name')) echo 'hello ' . request()->get('name');

        dump($_GET === request()->get());

        if (!empty($_GET['anothername'])) echo 'Hello ' . $_GET['anothername'] . '!';
    }
}