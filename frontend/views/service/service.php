<?php

use yii\helpers\Html;

if ($services):
?>


<!-- Services Section -->
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Services</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class="row text-center">
            <?php foreach ($services as $service): ?>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <?= Html::img($service->getUploadedFileUrl('icon'), ['alt' => Html::encode($service->name)]) ?>
                </span>
                <h4 class="service-heading"><?= Html::encode($service->name) ?></h4>
                <p class="text-muted"><?= Html::encode($service->content) ?></p>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<?php endif ?>
