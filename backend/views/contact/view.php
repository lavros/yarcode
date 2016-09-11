<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\UserAccount;

/* @var $this yii\web\View */
/* @var $model common\models\Contact */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-view">

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

<?php

$attributes = [
    'id',
    'created_at:datetime',
    'name',
    'email:email',
    'phone',
    'message:ntext',
    [
        'label' => $model->getAttributeLabel('status'),
        'value' => $model->getStatusLabel(),
    ],
];

if ($model->isReaded()) {
    $attributes[] = 'readed_at:datetime';
    $attributes[] = [
        'label' => $model->getAttributeLabel('readed_by'),
        'value' => UserAccount::findIdentity($model->readed_by)->profile->fullName,
    ];
}

echo DetailView::widget([
    'model' => $model,
    'attributes' => $attributes,
]);

?>

</div>
