<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Timeline;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TimelineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Timelines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timeline-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Timeline', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::img($model->getUploadedFileUrl('image'), ['style' => 'max-width:100px']);
                },
            ],
            'title',
            'date_from',
            [
                'attribute' => 'date_from_format',
                'filter' => Timeline::getDateFormatLabels(),
                'value' => function($model) {
                    return $model->getDateFormatLabel($model->date_from_format);
                },
            ],
            'date_to',
            [
                'attribute' => 'date_to_format',
                'filter' => Timeline::getDateFormatLabels(),
                'value' => function($model) {
                    return $model->getDateFormatLabel($model->date_to_format);
                },
            ],
            // 'content:ntext',
            [
                'attribute' => 'side',
                'filter' => Timeline::getSideLabels(),
                'value' => function($model) {
                    return $model->getSideLabel();
                },
            ],
            [
                'attribute' => 'status',
                'filter' => Timeline::getStatusLabels(),
                'value' => function($model) {
                    return $model->getStatusLabel();
                },
            ],
            // 'created_by',
            // 'updated_by',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
