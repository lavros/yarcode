<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TeamMemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Team Members';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-member-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Team Member', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'photo',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::img($model->getUploadedFileUrl('photo'));
                },
            ],
            'first_name',
            'last_name',
            'post',
            'position',
            [
                'attribute' => 'status',
                'filter' => common\models\TeamMember::getStatusLabels(),
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
