<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Contact Us</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <?php if (Yii::$app->session->hasFlash('contactSubmitted')): ?>
        <div class="alert alert-success text-center lead"><strong><?= Yii::$app->session->getFlash('contactSubmitted') ?></strong></div>
        <?php else: ?>
        <?= $this->render('/contact/_form', ['model' => $model]) ?>
        <?php endif ?>
    </div>
</section>
