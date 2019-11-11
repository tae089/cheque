<aside class="main-sidebar">
<?php
use yii\helpers\Html;
?>
<?php if(!Yii::$app->user->isGuest){ ?>
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                 <?php echo Html::img(Yii::getAlias('@web').'/img/user.png',['class'=>'user-image','alt'=>'User Image'])?>
            </div>
            <div class="pull-left info">
                <p>
                <?php if(!Yii::$app->user->isGuest){echo Yii::$app->user->identity->username;}?>
                    
                </p>

               <a href="index.php?r=user/profile/show&id=<?php echo Yii::$app->user->identity->id; ?>"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'เมนู', 'options' => ['class' => 'header']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Cheque', 'url' => ['cheque-detail/index'],'icon' => 'money']
                    // ['label' => 'ข่าวสาร กิจกรรม', 'url' => ['/news/index'],'icon' => 'fa fa-rss-square'],
                    // ['label' => 'ภาพสไลด์', 'url' => ['/slide-photo/index'],'icon' => 'fa fa-file-photo-o'],
                    // ['label' => 'อัลบั้มภาพ', 'url' => ['/album-photo/index'],'icon' => 'fa  fa-image'],
                    // ['label' => 'แผนผัง', 'url' => ['/diagrams/index'],'icon' => 'fa fa-sitemap'],
                    // ['label' => '24กตัญญู', 'url' => ['/grateful/index'],'icon' => 'fa  fa-heart'],
                    // ['label' => 'โปรโมชั่น ร้านชา', 'url' => ['/promotion/index'],'icon' => 'fa  fa-heart'],
                    // ['label' => 'สินค้า ร้านชา', 'url' => ['/product/index'],'icon' => 'fa  fa-heart'],
                    // ['label' => 'ภาพปก', 'url' => ['/photo/index'],'icon' => 'fa  fa-image'],
                    // ['label' => 'จัดการ Admin', 'url' => ['/user/admin/index'],'icon' => 'fa fa-gear'],
                    // ['label' => 'จัดการ เมนู', 'url' => ['/menu-music/index'],'icon' => 'fa fa-gear'],
                    // ['label' => 'จัดการ ประวัติความเป็นมา', 'url' => ['/history/index'],'icon' => 'fa fa-gear'],
                    
/*                    [
                        'label' => 'Same tools',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                        ],
                    ],*/
                ],
            ]
        ) ?>

    </section>
    <?php } ?>
</aside>
