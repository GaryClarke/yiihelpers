<?php

namespace app\controllers;

use yii\helpers\Html;
use app\models\Article;
use yii\base\Controller;

class ModelValidationController extends Controller {

    private function getLongTitle()
    {
        return 'Eheu.Poeta lotus lanista est.Capios sunt boreass de superbus abactor.Sunt eraes perdere emeritis, peritus ionicis tormentoes.Ecce, cannabis!Est teres victrix, cesaris.Candidatuss sunt vortexs de fidelis pulchritudine.Festus abactus una locuss bulla est.Eheu.Noster, dexter accentors inciviliter transferre de primus, secundus stella.Peregrinatione velox ducunt ad salvus decor.';
    }

    private function getShortTitle()
    {
        return 'This is a short title';
    }

    private function renderContentByModel($title)
    {
        $model = new Article();
        $model->title = $title;

        if ($model->validate())
        {
            $content = Html::tag('div', 'Model is valid.', [
                'class' => 'alert alert-success',
            ]);

            return $this->renderContent($content);
        }

        $content = Html::tag('div', 'Model is not valid.', [
            'class' => 'alert alert-danger',
        ]);

        return $this->renderContent($content);
    }

    public function actionSuccess()
    {
        $title = $this->getShortTitle();

        return $this->renderContentByModel($title);
    }

    public function actionFailure()
    {
        $title = $this->getLongTitle();

        return $this->renderContentByModel($title);
    }
}