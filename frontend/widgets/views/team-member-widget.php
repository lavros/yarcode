<?php
use yii\helpers\Html;

if ($teamMembers): ?>
<!-- Team Section -->
<section id="team" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Our Amazing Team</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class="row">
        <?php foreach ($teamMembers as $teamMember): ?>
            <div class="col-sm-4">
                <div class="team-member">
                    <?= Html::img($teamMember->getUploadedFileUrl('photo'), [
                        'alt' => Html::encode($teamMember->fullName),
                        'class' => 'img-responsive img-circle',
                    ]) ?>
                    <h4><?= Html::encode($teamMember->fullName) ?></h4>
                    <p class="text-muted"><?= Html::encode($teamMember->post) ?></p>
                    <ul class="list-inline social-buttons">
                        <li><a href="#fail"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#fail"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#fail"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        <?php endforeach ?>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
            </div>
        </div>
    </div>
</section>
<?php endif ?>
