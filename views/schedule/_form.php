<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Schedule $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="schedule-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">

        <div class="col-md-6 col-xs-12 col-lg-6">
            <?= $form->field($model, 'title')->textInput() ?>
        </div>
        <div class="col-md-6 col-xs-12 col-lg-6">
            <?= $form->field($model, 'schedule_time')->input('date') ?>
        </div>
        <div class="col-md-12 col-xs-12 col-lg-12">
            <?= $form->field($model, 'content')->textarea(['rows' => 4]) ?>
        </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
