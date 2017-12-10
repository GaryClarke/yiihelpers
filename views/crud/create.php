<?php

use yii\web\View;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/*
 * @var View $this
 */

?>

<h1><?= Yii::t('app', 'Create post'); ?></h1>
<?php $form = ActiveForm::begin(); ?>
<?php $form->errorSummary($model); ?>

<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'content')->textarea() ?>

<?= Html::submitButton(Yii::t('app', 'Create'), ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>




