<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/web/favicon.ico" type="image/x-icon">
    <?= Html::csrfMetaTags() ?>
    <title> 
    <?= "Web GIS Application"
    // Html::encode($this->title) 
    ?>
    </title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<b> <img src= "/logo.jpg" style="width:70px;height:30px;"> Bogor Agricultural University </b>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);

    $menuItems = [
        //['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Area of Interest', 'url' => ['/compare/index']],
        // ['label' => 'About', 'url' => ['/site/about']],
        // ['label' => 'Contact', 'url' => ['/site/contact']],
    ];

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Documentation', 'url' => ['/documentation/index']];
        $menuItems[] = [
            'label' => Yii::t('app','Language'),
            'items' => [
                    [
                        'label'=>Yii::t('app','English'),
                        'url'=>'#',
                        'options'=>[
                            'class'=>'language',
                            'id'=>'en'
                        ],
                    ],
                    [
                        'label'=>Yii::t('app','Indonesian'),
                        'url'=>'#',
                        'options'=>[
                            'class'=>'language',
                            'id'=>'id'
                        ],
                    ]
            ],
        ];
        $menuItems[] = ['label' => 'Signup', 'url' => ['/user/register']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/user/login']];
    } else {
        $menuItems[] = [
            'label' => 'Pairwise Comparison',
            'items' => [
                 ['label' => 'Climate', 'url' => ['/climate/create']],
                 ['label' => 'Land', 'url' => ['/land/create']],
                 ['label' => 'Accessibility', 'url' => ['accessibility/create']],
                 ['label' => 'Factors', 'url' => ['factors/create']],
            ],
        ];
        $menuItems[] = ['label' => 'Sensitivity Analysis', 'url' => ['/advusr/index']];
        $menuItems[] = ['label' => 'Documentation', 'url' => ['/documentation/index']];
        $menuItems[] = [
            'label' => Yii::t('app','Language'),
            'items' => [
                    [
                        'label'=>Yii::t('app','English'),
                        'url'=>'#',
                        'options'=>[
                            'class'=>'language',
                            'id'=>'en'
                        ],
                    ],
                    [
                        'label'=>Yii::t('app','Indonesian'),
                        'url'=>'#',
                        'options'=>[
                            'class'=>'language',
                            'id'=>'id'
                        ],
                    ]
            ],
        ];
        $menuItems[] = [
            'label' => 'User',
            'items' => [
                ['label' => 'Manage User', 'url' => ['/user/admin']],
                ['label' => 'Logout (' . Yii::$app->user->identity->username . ')', 'url' => ['site/logout'], 'linkOptions' => ['data-method' => 'post']],

                ],
        ];
    }

    echo Nav::widget([
        'encodeLabels' => false,
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Restu Jati S <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
<script type="text/javascript">
    $(function(){
        $(document).on('click','.language',function(){
            var lang = $(this).attr('id');
            $.post('<?php echo Url::to(['/site/language']);?>',{'lang':lang},function(data){
                location.reload();
            });
            console.log(lang);        
        });

    });
</script>
</body>
</html>
<?php $this->endPage() ?>
