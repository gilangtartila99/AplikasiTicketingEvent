<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="uploads/himatif.png">
    <title>Ticketing Event</title>
    <?php $this->head() ?>
    <link rel="stylesheet" type="text/css" href="css/main_layout.css">
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Ticketing Event',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbarku',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $menu = [
            ['label' => 'Halaman Utama', 'url' => ['/site/index']],
            ['label' => 'Login', 'url' => ['/site/login']],
        ];
    } else {
        $menu = [
            ['label' => 'Halaman Utama', 'url' => ['/site/index']],
            [
            'label' => 'Ticket',
                'items' => [
                    ['label' => 'Check Ticket Masuk', 'url' => ['/site/checkmasuk']],
                    ['label' => 'Check Ticket Keluar', 'url' => ['/site/checkkeluar']],
                    ['label' => 'Cetak Ticket', 'url' => ['/site/ticket']],
                ],
            ],
            [
                'label' => 'Profile <span class="badge">'. Yii::$app->user->identity->nama .'</span>',
                'items' => [
                    ['label' => 'Ganti Password', 'url' => ['/users/update', 'id' => Yii::$app->user->identity->id]],
                    '<li class="divider"></li>',
                    ['label' => 'Logout', 'url' => ['/site/logout']],
                ],
            ],
            //['label' => 'Evaluasi Lembur', 'url' => ['/evaluasi/create']],
            //['label' => 'Logout (' . Yii::$app->user->identity->nama . ')', 'url' => ['/site/logout'], 'method' => 'POST'],
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menu,
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<!--<footer class="footer warna">
    <div class="container">
        <p class="pull-left">&copy; Aplikasi Lembur <?php echo date('Y') ?></p>

        <p class="pull-right"><?php echo Yii::powered() ?></p>
    </div>
</footer>-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
