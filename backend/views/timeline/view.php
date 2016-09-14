<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\UserAccount;

/* @var $this yii\web\View */
/* @var $model common\models\Timeline */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Timelines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timeline-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => $model->getAttributeLabel('image'),
                'format' => 'raw',
                'value' => Html::img($model->getUploadedFileUrl('image'), [
                    'alt' => Html::encode($model->getUploadedFileUrl('image')),
                    'title' => Html::encode($model->getUploadedFileUrl('image')),
                ]),
            ],
            'title',
            [
                'label' => $model->getAttributeLabel('date_from'),
                'value' => $model->date_from . ' (' . Yii::$app->formatter->asDate($model->date_from) . ')',
            ],
            [
                'label' => $model->getAttributeLabel('date_from_format'),
                'value' => $model->getDateFormatLabel($model->date_from_format),
            ],
            [
                'label' => $model->getAttributeLabel('date_to'),
                'value' => empty($model->date_to) ? $model->date_to : $model->date_to . ' (' . Yii::$app->formatter->asDate($model->date_to) . ')',
            ],
            [
                'label' => $model->getAttributeLabel('date_to_format'),
                'value' => $model->getDateFormatLabel($model->date_to_format),
            ],
            'content:ntext',
            [
                'label' => $model->getAttributeLabel('side'),
                'value' => $model->getSideLabel(),
            ],
            [
                'label' => $model->getAttributeLabel('status'),
                'value' => $model->getStatusLabel(),
            ],
            [
                'label' => $model->getAttributeLabel('created_by'),
                'value' => UserAccount::findIdentity($model->created_by)->profile->fullName,
            ],
            [
                'label' => $model->getAttributeLabel('updated_by'),
                'value' => UserAccount::findIdentity($model->updated_by)->profile->fullName,
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
