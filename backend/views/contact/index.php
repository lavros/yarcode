<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Contact', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'created_at:datetime',
            'name',
            'email:email',
            'phone',
            //'message:ntext',
            // 'readed_at',
            [
                'attribute' => 'status',
                'filter' => common\models\Contact::getStatusLabels(),
                'value' => function($model) {
                    return $model->getStatusLabel();
                },
            ],
            // 'readed_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
