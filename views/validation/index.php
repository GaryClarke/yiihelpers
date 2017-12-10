<?php
use yii\helpers\Html;
use app\models\DeliveryForm;
use yii\bootstrap\ActiveForm;

/* @var DeliveryForm $model */
?>

<h1>Delivery Form</h1>



<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'type')->dropDownList($model->typeList(), [
    'id'     => 'deliveryform-type',
    'prompt' => 'Select delivery type'

]) ?>

<?= $form->field($model, 'address') ?>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
