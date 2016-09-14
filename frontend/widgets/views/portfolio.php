<?php
use yii\helpers\Html;

if ($projects): ?>
<!-- Portfolio Grid Section -->
<section id="portfolio" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Portfolio</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>

        <div class="row">
        <?php foreach ($projects as $project): ?>
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a href="#portfolioModal<?= $project->id ?>" class="portfolio-link" data-toggle="modal">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <?= Html::img($project->getThumbFileUrl('picture'), [
                        'alt' => Html::encode($project->name),
                        'class' => 'img-responsive',
                    ]) ?>
                </a>
                <div class="portfolio-caption">
                    <h4><?= Html::encode($project->name) ?></h4>
                    <p class="text-muted"><?= Html::encode($project->category->name) ?></p>
                </div>
            </div>
        <?php endforeach ?>
        </div>

    </div>
</section>

<!-- Portfolio Modals -->
<!-- Use the modals below to showcase details about your portfolio projects! -->
<?php 
foreach ($projects as $project) {
    echo $this->render('portfolio-modal', ['project' => $project]);
}
?>

<?php endif ?>