<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $get_geojson_kecamatan  = "SELECT *, ST_AsGeoJson(geom), ST_X(ST_Centroid(geom)), ST_Y(ST_Centroid(geom)) FROM admin";
        $data_admin             = Yii::$app->db->createCommand($get_geojson_kecamatan)->queryAll();

        $get_bbox               = "SELECT ST_AsGeoJson(Box2D(ST_Union(geom))) FROM admin";
        $bbox_geojsons          = Yii::$app->db->createCommand($get_bbox)->queryColumn();
        $bbox_geojson           = $bbox_geojsons[0];

        return $this->render('index', [
            'data_admin' => $data_admin,
            'bbox_geojson' => $bbox_geojson
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionChart()
    {
        return $this->render('chart');
    }

    public function actionLanguage()
    {
        if(isset($_POST['lang'])){

            Yii::$app->language = $_POST['lang'];
            
            $cookie = new yii\web\Cookie(['name'=>'lang','value'=>$_POST['lang']]);

            Yii::$app->getResponse()->getCookies()->add($cookie);

            return Yii::$app->language;
        }
    }
}
