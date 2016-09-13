
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->profile->fullName?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= \yii\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Main Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Frontend', 'icon' => 'fa fa-link', 'url' => Yii::$app->params['frontendBaseUrl']],
                    ['label' => 'Home', 'icon' => 'fa fa-home', 'url' => ['/site/index']],
                    ['label' => 'Services', 'icon' => 'fa fa-home', 'url' => ['/service/index']],
                    ['label' => 'Project Categories', 'icon' => 'fa fa-home', 'url' => ['/project-category/index']],
                    ['label' => 'Team members', 'icon' => 'fa fa-home', 'url' => ['/team-member/index']],
                    ['label' => 'Clients', 'icon' => 'fa fa-home', 'url' => ['/client/index']],
                    ['label' => 'Contacts', 'icon' => 'fa fa-home', 'url' => ['/contact/index']],
                    ['label' => 'Change Password', 'icon' => 'fa fa-lock', 'url' => ['/profile/change-password']],
                ],
            ]
        ) ?>

    </section>

</aside>
