<?php

use yii\helpers\Html;
?>
<div class="portfolio-modal modal fade" id="portfolioModal<?= $project->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2><?= Html::encode($project->title) ?></h2>
                            <p class="item-intro text-muted"><?= Html::encode($project->intro) ?></p>
                            <?= Html::img($project->getImageFileUrl('picture'), [
                                'alt' => Html::encode($project->title),
                                'class' => 'img-responsive img-centered',
                            ]) ?>
                            <?= $project->content ?>
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
