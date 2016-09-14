<?php 
use yii\helpers\Html;

if ($timelines): ?>
<!-- About Section -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">About</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="timeline">

                <?php foreach ($timelines as $timeline): ?>
                    <li<?= $timeline->isRightSide() ? ' class="timeline-inverted"' : '' ?>> 
                        <div class="timeline-image">
                            <?= Html::img($timeline->getUploadedFileUrl('image'), [
                                'alt' => Html::encode($timeline->title),
                                'class' => 'img-circle img-responsive',
                            ]) ?>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4><?= $timeline->date ?></h4>
                                <h4 class="subheading"><?= Html::encode($timeline->title) ?></h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted"><?= Html::encode($timeline->content) ?></p>
                            </div>
                        </div>
                    </li>
                <?php endforeach ?>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>Be Part
                                <br>Of Our
                                <br>Story!</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php endif ?>
