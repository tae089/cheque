<?php
use yii\helpers\Html;
use dektrium\user\models\User;
use dektrium\user\models\profile;
/* @var $this \yii\web\View */
/* @var $content string */
$title_name ='Cheque System';
if(!Yii::$app->user->isGuest){$id = Yii::$app->user->identity->id;}else{$id='';}
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">Cheque</span><span class="logo-lg">' . $title_name . '</span>', 'user/profile/show&id='.$id, ['class' => 'logo']) ?>
    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <?php if(!Yii::$app->user->isGuest){ ?>
                    <!-- Messages: style can be found in dropdown.less-->
           

    <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php echo Html::img(Yii::getAlias('@web').'/img/user.png',['class'=>'user-image','alt'=>'User Image']);?>
            <span class="hidden-xs">
                <?php if(!Yii::$app->user->isGuest){echo Yii::$app->user->identity->username;}?>
            </span>
        </a>
        <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
                 <?php echo Html::img(Yii::getAlias('@web').'/img/user.png',['class'=>'user-image','alt'=>'User Image']);?>

                <p>
                   <?php if(!Yii::$app->user->isGuest){echo Yii::$app->user->identity->username;}?>
                </p>
            </li>
            <!-- Menu Body -->

            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="pull-left">
                    <?php echo Html::a('Profile',['user/settings/account'], ['class' => 'btn btn-default btn-flat']) ?>
                </div>
                <div class="pull-right">
                    <?= Html::a(
                        'Sign out',
                                    //['/site/logout'],
                        ['/user/security/logout'],
                        ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                        ) ?>
                </div>
            </li>
        </ul>
    </li>

    <!-- User Account: style can be found in dropdown.less -->
    <!--<li>
        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
    </li>-->
</ul>
<?php }else{ ?>
    <li>
      <a href="user/security/login">
        <i class="fa fa-lock text-white"></i> Login
    </a>
</li>
<?php } ?>
</div>
</nav>
</header>
