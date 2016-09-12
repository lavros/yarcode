<?php
use yii\helpers\Html;

if ($clients): ?>
<!-- Clients Aside -->
<aside class="clients">
    <div class="container">
        <div class="row">
        <?php foreach ($clients as $client): ?>
            <div class="col-md-3 col-sm-6">
            <?php
            if ($client->url):
                echo Html::a(Html::img($client->getUploadedFileUrl('logo'), [
                    'alt' => Html::encode($client->name),
                    'class' => 'img-responsive img-centered',
                ]), $client->url);
            else:
                echo Html::img($client->getUploadedFileUrl('logo'), [
                    'alt' => Html::encode($client->name),
                    'class' => 'img-responsive img-centered',
                ]);
            endif
            ?>
            </div>
        <?php endforeach ?>
        </div>
    </div>
</aside>
<?php endif ?>
