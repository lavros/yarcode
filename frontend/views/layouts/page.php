<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->beginContent('@frontend/views/layouts/main.php');
?>
<div class="container">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= $content ?>
</div>
<?php $this->endContent(); ?>
