<?php

namespace app\controllers;

use app\models\User;
use yii\helpers\Html;
use yii\web\ViewAction;
use yii\web\Controller;
use app\models\BlogPost;
use yii\helpers\VarDumper;
use yii\filters\AccessControl;

class TestController extends Controller {

    public function actions()
    {
        return [
            'page' => [
                'class' => ViewAction::class
            ]
        ];
    }


    public function behaviors()
    {
        return [
            'access' => [
                'class'        => AccessControl::className(),
                'rules'        => [
                    [
                        'allow'   => 'true',
                        'roles'   => ['@'],
                        'actions' => ['user']
                    ],
                    [
                        'allow'   => 'true',
                        'roles'   => ['?'],
                        'actions' => ['index', 'success', 'error']
                    ]
                ],
                'denyCallback' => function ($rule, $action)
                {
                    app()->session->setFlash('error', 'This section is only for registered users.');
                    app()->user->loginRequired();
                },
            ],
        ];
    }


    public function actionIndex()
    {
        $blogPostA = new BlogPost();
        $blogPostA->title = 'Super Quote title 1';
        $blogPostA->text = 'The price of success is hard work, dedication to the job at hand';
        $blogPostA->save();

        $blogPostB = new BlogPost();
        $blogPostB->title = 'Super Quote title 2';
        $blogPostB->text = 'Happiness lies in the joy of achievement...';
        $blogPostB->save();

        return $this->renderContent(
            '<pre>' .
            VarDumper::dumpAsString($blogPostA->attributes) .
            VarDumper::dumpAsString($blogPostB->attributes) .
            '</pre>'
        );
    }


//    public function saveOrShow($model, $options = ['redirect', 'render'])
//    {
//
//    }


    public function actionSuccess()
    {
        app()->session->setFlash('success', 'Great stuff');

        return $this->redirect('index');
    }


    public function actionUser()
    {
        return $this->renderContent('user');
    }


    public function actionContact()
    {
        return $this->render('contact');
    }
}