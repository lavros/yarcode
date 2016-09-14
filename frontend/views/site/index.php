<?php
/**
 * @var $this yii\web\View
 */
?>

<?= frontend\widgets\ServiceWidget::widget() ?>

<?= frontend\widgets\PortfolioWidget::widget() ?>

<?= frontend\widgets\TimelineWidget::widget() ?>

<?= frontend\widgets\TeamMemberWidget::widget() ?>

<?= frontend\widgets\ClientWidget::widget() ?>

<?= $this->render('/contact/contact.php', ['model' => $contact]) ?>

