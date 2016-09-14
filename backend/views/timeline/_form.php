<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \common\models\Timeline;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Timeline */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="timeline-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
        'options' => [
            'enctype' => 'multipart/form-data',
        ],
    ]); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'date_from')->widget(DatePicker::className(), [
                'clientOptions' => [
                    'format' => 'yyyy-mm-dd',
                ],
            ]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'date_to')->widget(DatePicker::className(), [
                'clientOptions' => [
                    'format' => 'yyyy-mm-dd',
                ],
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6"><?= $form->field($model, 'date_from_format')->dropDownList(Timeline::getDateFormatLabels(), ['prompt' => '']) ?></div>
        <div class="col-sm-6"><?= $form->field($model, 'date_to_format')->dropDownList(Timeline::getDateFormatLabels(), ['prompt' => '']) ?></div>
    </div>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'side')->dropDownList(Timeline::getSideLabels()) ?>

    <?= $form->field($model, 'status')->dropDownList(Timeline::getStatusLabels()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
