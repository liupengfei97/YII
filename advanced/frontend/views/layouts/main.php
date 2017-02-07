<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::t('common', 'test'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $LeftMenuItems = [
        ['label' => Yii::t('common', 'Home'), 'url' => ['/site/index']],
        ['label' => Yii::t('common', 'Article'), 'url' => ['/Article/index']],
        ['label' => Yii::t('common', 'About'), 'url' => ['/site/about']],
        ['label' => Yii::t('common', 'Contact'), 'url' => ['/site/contact']],

    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Yii::t('common', 'Signup'), 'url' => ['/site/signup']];
        $menuItems[] = ['label' => Yii::t('common', 'Login'), 'url' => ['/site/login']];
    } else {
//        $menuItems[] = '<li>'
//            . Html::beginForm(['/site/logout'], 'post')
//            . Html::submitButton(
////                'Logout (' . Yii::$app->user->identity->username . ')',
//                Yii::t('common', 'Logout') . '&nbsp;&nbsp;[用户名：' . Yii::$app->user->identity->username . ']',
//                ['class' => 'btn btn-link']
//            )
//            . Html::endForm()
//            . '</li>';

        $menuItems[] = [
            'label'         => '<img width="28px" height="28px" src="'.Yii::$app->params['avatar'].'" alt="'.Yii::$app->user->identity->username.'">',
            'linkOptions'   => ['class' => 'avatar'],
            'items' => [
                ['label'    => '<i class="fa fa-sign-out"></i>&nbsp;&nbsp;&nbsp;' . Yii::t('common', 'Logout'), 'url'    => ['/site/logout'], 'linkOptions'  =>['data-method' => 'post']],
                ['label'    => '<i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;个人中心', 'url'    => ['/site/logout']],
            ],
        ];
    }
    echo Nav::widget([
        'options'       => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels'  => false,
        'items'         => $menuItems,
    ]);
    echo Nav::widget([
        'options'   => ['class' => 'navbar-nav navbar-left'],
        'items'     => $LeftMenuItems,
    ]);


    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
