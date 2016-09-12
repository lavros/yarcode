<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\UserAccount;

/* @var $this yii\web\View */
/* @var $model common\models\Service */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-view">

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
            'name',
            'content',
            [
                'label' => $model->getAttributeLabel('icon'),
                'format' => 'raw',
                'value' => Html::img($model->getUploadedFileUrl('icon'), [
                    'alt' => Html::encode($model->getUploadedFileUrl('icon')),
                    'title' => Html::encode($model->getUploadedFileUrl('icon')),
                ]),
            ],
            'position',
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
