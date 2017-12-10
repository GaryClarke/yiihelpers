<?php

use yii\base\View;
use yii\bootstrap\Alert;

/* @var $this View */

?>

<?php if (app()->session->hasFlash('success')) : ?>

    <?= Alert::widget([
        'options' => ['class' => 'alert-success'],
        'body' => app()->session->getFlash('success'),
    ]); ?>

<?php endif; ?>


<?php if (app()->session->hasFlash('error')) : ?>

    <?= Alert::widget([
        'options' => ['class' => 'alert-danger'],
        'body' => app()->session->getFlash('error'),
    ]); ?>

<?php endif; ?>

