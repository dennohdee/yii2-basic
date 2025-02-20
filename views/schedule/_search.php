<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ScheduleSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="schedule-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-6 col-xs-12 col-lg-4">
            <?= $form->field($model, 'title') ?>
        </div>
        <div class="col-md-6 col-xs-12 col-lg-4">
            <?= $form->field($model, 'content') ?>
        </div>
        <div class="col-md-6 col-xs-12 col-lg-4">
            <?= $form->field($model, 'schedule_time')->input('date') ?>
        </div>
    </div>
    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
