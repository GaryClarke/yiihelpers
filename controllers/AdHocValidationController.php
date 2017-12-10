<?php

namespace app\controllers;

use yii\helpers\Html;
use yii\web\Controller;
use app\components\WordsValidator;

class AdhocValidationController extends Controller {

    private function getLongTitle()
    {
        return 'Cur ignigena tolerare?Ubi est noster finis?Voxs accelerare in piscinam!Turpis de ferox rumor, dignus classis!Bi-color, domesticus lubas sapienter dignus de ferox, raptus byssus.Lapsus, spatii, et adelphis.';
    }

    private function getShortTitle()
    {
        return 'This is a short title.';
    }

    private function renderContentByTitle($title)
    {
        $validator = new WordsValidator([
            'size' => 10,
        ]);

        if ($validator->validate($title, $error)) {

            $content = Html::tag('div', 'Value is valid.', [
                'class' => 'alert alert-success',
            ]);

        } else {

            $content = Html::tag('div', $error, [
                'class' => 'alert alert-danger',
            ]);
        }

        return $this->renderContent($content);
    }

    public function actionSuccess()
    {
        $title = $this->getShortTitle();

        return $this->renderContentByTitle($title);
    }

    public function actionFailure()
    {
        $title = $this->getLongTitle();

        return $this->renderContentByTitle($title);
    }
}