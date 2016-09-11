<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Contact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-form">

    <?php $form = ActiveForm::begin([
        'action' => '#contact',
        'fieldConfig' => [
            'inputOptions' => [
                'class' => 'form-control',
                'enableLabel' => false,
            ],
        ],
    ]); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name', [
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('name'),
                ],
            ])->textInput(['maxlength' => true])->label(false) ?>

            <?= $form->field($model, 'email', [
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('email'),
                ],
            ])->textInput(['maxlength' => true])->label(false) ?>

            <?= $form->field($model, 'phone', [
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('phone'),
                ],
            ])->textInput(['maxlength' => true])->label(false) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'message', [
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('message'),
                ],
            ])->textarea()->label(false) ?>
        </div>
    </div>

    <div class="form-group text-center">
        <?= Html::submitButton('Send Message', ['class' => 'btn btn-xl']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
