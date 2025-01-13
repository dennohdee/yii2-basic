<?php

use app\models\Article;
use app\models\ArticleComments;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $commentModel app\models\ArticleComments */
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->id === $model->created_by): ?>
        <p>
            <?php echo Html::a('Update', ['update', 'id' => $model->id,'slug' => $model->slug], ['class' => 'btn btn-primary']) ?>
            <?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif ?>

    <div>
        <h1><?php echo Html::encode($model->title) ?></h1>
        <p class="text-muted">
            <small>
                Created at: <?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?>
                By: <?php echo $model->createdBy?->username ?>
            </small>
        </p>
        <div>
            <?php echo Html::encode($model->body); ?>
        </div>
    </div>
    <hr/>
    <h6>Comments</h6>
    <div class="card card-body ">
        <!-- comments -->
        <?php if (!empty($model->comments)): ?>
            <?php foreach ($model->comments as $comment): ?>
                <div>
                    <p class="text-muted"><?php echo Html::encode($comment->comment) ?></p>
                    <p class="text-muted">
                        <small>
                            Created On: <?=$comment->created_at ?>
                        </small>
                    </p>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>
    <div class="article-form">
        <?php $form = ActiveForm::begin([
            'method' => 'post',
            'action' => ['comment', 'id' => $model->id],
        ]); ?>

        <?= $form->field($commentModel, 'comment')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>