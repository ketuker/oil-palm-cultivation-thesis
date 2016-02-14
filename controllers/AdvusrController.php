<?php

namespace app\controllers;

use Yii;
use app\models\Advusr;
use app\models\AdvusrSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdvusrController implements the CRUD actions for Advusr model.
 */
class AdvusrController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Advusr models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdvusrSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Advusr model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Advusr model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCrclimate(){
        if (Yii::$app->request->post()) {

            $ch_temp    = $_POST['ch_temp'];
            $temp_ch    = 1 / $ch_temp;
            $ch_ch      = 1;


            $temp_dm    = $_POST['temp_dm'];
            $dm_temp    = 1 / $temp_dm;
            $temp_temp  = 1;

            $ch_dm      = $_POST['ch_dm'];
            $dm_ch      = 1 / $ch_dm;
            $dm_dm      = 1;

            $sum_column_ch      = $ch_ch + $temp_ch + $dm_ch;
            $sum_column_temp    = $ch_temp + $temp_temp + $dm_temp;
            $sum_column_dm      = $ch_dm + $temp_dm + $dm_dm;


            /* ---- */
            $divided_sum_sum        = $sum_column_ch / $sum_column_ch;

            $divided_ch_ch_sum      = $ch_ch / $sum_column_ch;
            $divided_ch_temp_sum    = $temp_ch / $sum_column_ch;
            $divided_ch_dm_sum      = $dm_ch / $sum_column_ch;

            $divided_temp_ch_sum    = $ch_temp / $sum_column_temp;
            $divided_temp_temp_sum  = $temp_temp / $sum_column_temp;
            $divided_temp_dm_sum    = $dm_temp / $sum_column_temp;

            $divided_dm_ch_sum      = $ch_dm / $sum_column_dm;
            $divided_dm_temp_sum    = $temp_dm / $sum_column_dm;
            $divided_dm_dm_sum      = $dm_dm / $sum_column_dm;
            /* ---- */

            $sum_ch             = $divided_ch_ch_sum + $divided_temp_ch_sum + $divided_dm_ch_sum;
            $sum_temp           = $divided_ch_temp_sum + $divided_temp_temp_sum + $divided_dm_temp_sum;
            $sum_dm             = $divided_ch_dm_sum + $divided_temp_dm_sum + $divided_dm_dm_sum;
            $sum_divided        = $divided_sum_sum + $divided_sum_sum + $divided_sum_sum;

            /* ---- */
            $bobot_ch           = $sum_ch / $sum_divided;
            $bobot_temp         = $sum_temp / $sum_divided;
            $bobot_dm           = $sum_dm / $sum_divided;
            /* ---- */

            /* ---- */
            $multiple_ch_ch_bobot      = $ch_ch * $bobot_ch;
            $multiple_ch_temp_bobot    = $temp_ch * $bobot_ch;
            $multiple_ch_dm_bobot      = $dm_ch * $bobot_ch;

            $multiple_temp_ch_bobot    = $ch_temp * $bobot_temp;
            $multiple_temp_temp_bobot  = $temp_temp * $bobot_temp;
            $multiple_temp_dm_bobot    = $dm_temp * $bobot_temp;

            $multiple_dm_ch_bobot      = $ch_dm * $bobot_dm;
            $multiple_dm_temp_bobot    = $temp_dm * $bobot_dm;
            $multiple_dm_dm_bobot      = $dm_dm * $bobot_dm;
            /* ---- */

            /* ---- */
            $sum_bobot_ch               = $multiple_ch_ch_bobot + $multiple_temp_ch_bobot + $multiple_dm_ch_bobot;
            $sum_bobot_temp             = $multiple_ch_temp_bobot + $multiple_temp_temp_bobot + $multiple_dm_temp_bobot;
            $sum_bobot_dm               = $multiple_ch_dm_bobot + $multiple_temp_dm_bobot + $multiple_dm_dm_bobot;
            /* ---- */

            $divided_bobot_ch           = $sum_bobot_ch / $bobot_ch;
            $divided_bobot_temp         = $sum_bobot_temp / $bobot_temp;
            $divided_bobot_dm           = $sum_bobot_dm / $bobot_dm;

            /* ---- */
            $lamda_max                  = ($divided_bobot_ch + $divided_bobot_temp + $divided_bobot_dm) / $sum_divided;
            $jumlah_factor              = $sum_divided;
            $consistensi_index          = ($lamda_max-$jumlah_factor)/($jumlah_factor-1);
            $rasio_index                = 0.58;
            $consistensi_rasio          = $consistensi_index / $rasio_index;
            /* ---- */

            if ($consistensi_rasio < 0.1) {
                $validation             = TRUE;
            }else{
                $validation             = FALSE;
            }

            return json_encode(['crclimate' => $consistensi_rasio, 'validation' => $validation]);
            
        }
    }

    public function actionCrlandnpeat(){
        if (Yii::$app->request->post()) {

            $slope_text    = $_POST['slope_text'];
            $text_slope    = 1 / $slope_text;
            $slope_slope      = 1;


            $text_elev    = $_POST['text_elev'];
            $elev_text    = 1 / $text_elev;
            $text_text  = 1;

            $slope_elev      = $_POST['slope_elev'];
            $elev_slope      = 1 / $slope_elev;
            $elev_elev      = 1;

            $sum_column_slope      = $slope_slope + $text_slope + $elev_slope;
            $sum_column_text    = $slope_text + $text_text + $elev_text;
            $sum_column_elev      = $slope_elev + $text_elev + $elev_elev;


            /* ---- */
            $divided_sum_sum        = $sum_column_slope / $sum_column_slope;

            $divided_slope_slope_sum      = $slope_slope / $sum_column_slope;
            $divided_slope_text_sum    = $text_slope / $sum_column_slope;
            $divided_slope_elev_sum      = $elev_slope / $sum_column_slope;

            $divided_text_slope_sum    = $slope_text / $sum_column_text;
            $divided_text_text_sum  = $text_text / $sum_column_text;
            $divided_text_elev_sum    = $elev_text / $sum_column_text;

            $divided_elev_slope_sum      = $slope_elev / $sum_column_elev;
            $divided_elev_text_sum    = $text_elev / $sum_column_elev;
            $divided_elev_elev_sum      = $elev_elev / $sum_column_elev;
            /* ---- */

            $sum_slope             = $divided_slope_slope_sum + $divided_text_slope_sum + $divided_elev_slope_sum;
            $sum_text           = $divided_slope_text_sum + $divided_text_text_sum + $divided_elev_text_sum;
            $sum_elev             = $divided_slope_elev_sum + $divided_text_elev_sum + $divided_elev_elev_sum;
            $sum_divided        = $divided_sum_sum + $divided_sum_sum + $divided_sum_sum;

            /* ---- */
            $bobot_slope           = $sum_slope / $sum_divided;
            $bobot_text         = $sum_text / $sum_divided;
            $bobot_elev           = $sum_elev / $sum_divided;
            /* ---- */

            /* ---- */
            $multiple_slope_slope_bobot      = $slope_slope * $bobot_slope;
            $multiple_slope_text_bobot    = $text_slope * $bobot_slope;
            $multiple_slope_elev_bobot      = $elev_slope * $bobot_slope;

            $multiple_text_slope_bobot    = $slope_text * $bobot_text;
            $multiple_text_text_bobot  = $text_text * $bobot_text;
            $multiple_text_elev_bobot    = $elev_text * $bobot_text;

            $multiple_elev_slope_bobot      = $slope_elev * $bobot_elev;
            $multiple_elev_text_bobot    = $text_elev * $bobot_elev;
            $multiple_elev_elev_bobot      = $elev_elev * $bobot_elev;
            /* ---- */

            /* ---- */
            $sum_bobot_slope               = $multiple_slope_slope_bobot + $multiple_text_slope_bobot + $multiple_elev_slope_bobot;
            $sum_bobot_text             = $multiple_slope_text_bobot + $multiple_text_text_bobot + $multiple_elev_text_bobot;
            $sum_bobot_elev               = $multiple_slope_elev_bobot + $multiple_text_elev_bobot + $multiple_elev_elev_bobot;
            /* ---- */

            $divided_bobot_slope           = $sum_bobot_slope / $bobot_slope;
            $divided_bobot_text         = $sum_bobot_text / $bobot_text;
            $divided_bobot_elev           = $sum_bobot_elev / $bobot_elev;

            /* ---- */
            $lamda_max                  = ($divided_bobot_slope + $divided_bobot_text + $divided_bobot_elev) / $sum_divided;
            $jumlah_factor              = $sum_divided;
            $consistensi_index          = ($lamda_max-$jumlah_factor)/($jumlah_factor-1);
            $rasio_index                = 0.58;
            $consistensi_rasio          = $consistensi_index / $rasio_index;
            /* ---- */

            if ($consistensi_rasio < 0.1) {
                $validation             = TRUE;
            }else{
                $validation             = FALSE;
            }

            return json_encode(['crlandnpeat' => $consistensi_rasio, 'validation' => $validation]);
            
        }
    }

    public function actionCrlandpeat(){
        if (Yii::$app->request->post()) {

            $slope_thick    = $_POST['slope_thick'];
            $thick_slope    = 1 / $slope_thick;
            $slope_slope      = 1;


            $thick_ripe    = $_POST['thick_ripe'];
            $ripe_thick    = 1 / $thick_ripe;
            $thick_thick  = 1;

            $slope_ripe      = $_POST['slope_ripe'];
            $ripe_slope      = 1 / $slope_ripe;
            $ripe_ripe      = 1;

            $sum_column_slope      = $slope_slope + $thick_slope + $ripe_slope;
            $sum_column_thick    = $slope_thick + $thick_thick + $ripe_thick;
            $sum_column_ripe      = $slope_ripe + $thick_ripe + $ripe_ripe;


            /* ---- */
            $divided_sum_sum        = $sum_column_slope / $sum_column_slope;

            $divided_slope_slope_sum      = $slope_slope / $sum_column_slope;
            $divided_slope_thick_sum    = $thick_slope / $sum_column_slope;
            $divided_slope_ripe_sum      = $ripe_slope / $sum_column_slope;

            $divided_thick_slope_sum    = $slope_thick / $sum_column_thick;
            $divided_thick_thick_sum  = $thick_thick / $sum_column_thick;
            $divided_thick_ripe_sum    = $ripe_thick / $sum_column_thick;

            $divided_ripe_slope_sum      = $slope_ripe / $sum_column_ripe;
            $divided_ripe_thick_sum    = $thick_ripe / $sum_column_ripe;
            $divided_ripe_ripe_sum      = $ripe_ripe / $sum_column_ripe;
            /* ---- */

            $sum_slope             = $divided_slope_slope_sum + $divided_thick_slope_sum + $divided_ripe_slope_sum;
            $sum_thick           = $divided_slope_thick_sum + $divided_thick_thick_sum + $divided_ripe_thick_sum;
            $sum_ripe             = $divided_slope_ripe_sum + $divided_thick_ripe_sum + $divided_ripe_ripe_sum;
            $sum_divided        = $divided_sum_sum + $divided_sum_sum + $divided_sum_sum;

            /* ---- */
            $bobot_slope           = $sum_slope / $sum_divided;
            $bobot_thick         = $sum_thick / $sum_divided;
            $bobot_ripe           = $sum_ripe / $sum_divided;
            /* ---- */

            /* ---- */
            $multiple_slope_slope_bobot      = $slope_slope * $bobot_slope;
            $multiple_slope_thick_bobot    = $thick_slope * $bobot_slope;
            $multiple_slope_ripe_bobot      = $ripe_slope * $bobot_slope;

            $multiple_thick_slope_bobot    = $slope_thick * $bobot_thick;
            $multiple_thick_thick_bobot  = $thick_thick * $bobot_thick;
            $multiple_thick_ripe_bobot    = $ripe_thick * $bobot_thick;

            $multiple_ripe_slope_bobot      = $slope_ripe * $bobot_ripe;
            $multiple_ripe_thick_bobot    = $thick_ripe * $bobot_ripe;
            $multiple_ripe_ripe_bobot      = $ripe_ripe * $bobot_ripe;
            /* ---- */

            /* ---- */
            $sum_bobot_slope               = $multiple_slope_slope_bobot + $multiple_thick_slope_bobot + $multiple_ripe_slope_bobot;
            $sum_bobot_thick             = $multiple_slope_thick_bobot + $multiple_thick_thick_bobot + $multiple_ripe_thick_bobot;
            $sum_bobot_ripe               = $multiple_slope_ripe_bobot + $multiple_thick_ripe_bobot + $multiple_ripe_ripe_bobot;
            /* ---- */

            $divided_bobot_slope           = $sum_bobot_slope / $bobot_slope;
            $divided_bobot_thick         = $sum_bobot_thick / $bobot_thick;
            $divided_bobot_ripe           = $sum_bobot_ripe / $bobot_ripe;

            /* ---- */
            $lamda_max                  = ($divided_bobot_slope + $divided_bobot_thick + $divided_bobot_ripe) / $sum_divided;
            $jumlah_factor              = $sum_divided;
            $consistensi_index          = ($lamda_max-$jumlah_factor)/($jumlah_factor-1);
            $rasio_index                = 0.58;
            $consistensi_rasio          = $consistensi_index / $rasio_index;
            /* ---- */

            if ($consistensi_rasio < 0.1) {
                $validation             = TRUE;
            }else{
                $validation             = FALSE;
            }


            return json_encode(['crlandpeat' => $consistensi_rasio, 'validation' => $validation]);
            
        }
    }

    public function actionCraccess(){
        if (Yii::$app->request->post()) {

            $road_mills    = $_POST['road_mills'];
            $mills_road    = 1 / $road_mills;
            $road_road      = 1;


            $mills_town    = $_POST['mills_town'];
            $town_mills    = 1 / $mills_town;
            $mills_mills  = 1;

            $road_town      = $_POST['road_town'];
            $town_road      = 1 / $road_town;
            $town_town      = 1;

            $sum_column_road      = $road_road + $mills_road + $town_road;
            $sum_column_mills    = $road_mills + $mills_mills + $town_mills;
            $sum_column_town      = $road_town + $mills_town + $town_town;


            /* ---- */
            $divided_sum_sum        = $sum_column_road / $sum_column_road;

            $divided_road_road_sum      = $road_road / $sum_column_road;
            $divided_road_mills_sum    = $mills_road / $sum_column_road;
            $divided_road_town_sum      = $town_road / $sum_column_road;

            $divided_mills_road_sum    = $road_mills / $sum_column_mills;
            $divided_mills_mills_sum  = $mills_mills / $sum_column_mills;
            $divided_mills_town_sum    = $town_mills / $sum_column_mills;

            $divided_town_road_sum      = $road_town / $sum_column_town;
            $divided_town_mills_sum    = $mills_town / $sum_column_town;
            $divided_town_town_sum      = $town_town / $sum_column_town;
            /* ---- */

            $sum_road             = $divided_road_road_sum + $divided_mills_road_sum + $divided_town_road_sum;
            $sum_mills           = $divided_road_mills_sum + $divided_mills_mills_sum + $divided_town_mills_sum;
            $sum_town             = $divided_road_town_sum + $divided_mills_town_sum + $divided_town_town_sum;
            $sum_divided        = $divided_sum_sum + $divided_sum_sum + $divided_sum_sum;

            /* ---- */
            $bobot_road           = $sum_road / $sum_divided;
            $bobot_mills         = $sum_mills / $sum_divided;
            $bobot_town           = $sum_town / $sum_divided;
            /* ---- */

            /* ---- */
            $multiple_road_road_bobot      = $road_road * $bobot_road;
            $multiple_road_mills_bobot    = $mills_road * $bobot_road;
            $multiple_road_town_bobot      = $town_road * $bobot_road;

            $multiple_mills_road_bobot    = $road_mills * $bobot_mills;
            $multiple_mills_mills_bobot  = $mills_mills * $bobot_mills;
            $multiple_mills_town_bobot    = $town_mills * $bobot_mills;

            $multiple_town_road_bobot      = $road_town * $bobot_town;
            $multiple_town_mills_bobot    = $mills_town * $bobot_town;
            $multiple_town_town_bobot      = $town_town * $bobot_town;
            /* ---- */

            /* ---- */
            $sum_bobot_road               = $multiple_road_road_bobot + $multiple_mills_road_bobot + $multiple_town_road_bobot;
            $sum_bobot_mills             = $multiple_road_mills_bobot + $multiple_mills_mills_bobot + $multiple_town_mills_bobot;
            $sum_bobot_town               = $multiple_road_town_bobot + $multiple_mills_town_bobot + $multiple_town_town_bobot;
            /* ---- */

            $divided_bobot_road           = $sum_bobot_road / $bobot_road;
            $divided_bobot_mills         = $sum_bobot_mills / $bobot_mills;
            $divided_bobot_town           = $sum_bobot_town / $bobot_town;

            /* ---- */
            $lamda_max                  = ($divided_bobot_road + $divided_bobot_mills + $divided_bobot_town) / $sum_divided;
            $jumlah_factor              = $sum_divided;
            $consistensi_index          = ($lamda_max-$jumlah_factor)/($jumlah_factor-1);
            $rasio_index                = 0.58;
            $consistensi_rasio          = $consistensi_index / $rasio_index;
            /* ---- */

            if ($consistensi_rasio < 0.1) {
                $validation             = TRUE;
            }else{
                $validation             = FALSE;
            }

            return json_encode(['craccess' => $consistensi_rasio, 'validation' => $validation]);
            
        }
    }

        public function actionCrfactor(){
        if (Yii::$app->request->post()) {

            $climate_land       = $_POST['climate_land'];
            $land_climate       = 1 / $climate_land;
            $climate_climate    = 1;


            $land_accessibility    = $_POST['land_accessibility'];
            $accessibility_land    = 1 / $land_accessibility;
            $land_land             = 1;

            $climate_accessibility          = $_POST['climate_accessibility'];
            $accessibility_climate          = 1 / $climate_accessibility;
            $accessibility_accessibility    = 1;

            $sum_column_climate         = $climate_climate + $land_climate + $accessibility_climate;
            $sum_column_land            = $climate_land + $land_land + $accessibility_land;
            $sum_column_accessibility   = $climate_accessibility + $land_accessibility + $accessibility_accessibility;


            /* ---- */
            $divided_sum_sum        = $sum_column_climate / $sum_column_climate;

            $divided_climate_climate_sum        = $climate_climate / $sum_column_climate;
            $divided_climate_land_sum           = $land_climate / $sum_column_climate;
            $divided_climate_accessibility_sum  = $accessibility_climate / $sum_column_climate;

            $divided_land_climate_sum           = $climate_land / $sum_column_land;
            $divided_land_land_sum              = $land_land / $sum_column_land;
            $divided_land_accessibility_sum     = $accessibility_land / $sum_column_land;

            $divided_accessibility_climate_sum        = $climate_accessibility / $sum_column_accessibility;
            $divided_accessibility_land_sum           = $land_accessibility / $sum_column_accessibility;
            $divided_accessibility_accessibility_sum  = $accessibility_accessibility / $sum_column_accessibility;
            /* ---- */

            $sum_climate        = $divided_climate_climate_sum + $divided_land_climate_sum + $divided_accessibility_climate_sum;
            $sum_land           = $divided_climate_land_sum + $divided_land_land_sum + $divided_accessibility_land_sum;
            $sum_accessibility  = $divided_climate_accessibility_sum + $divided_land_accessibility_sum + $divided_accessibility_accessibility_sum;
            $sum_divided        = $divided_sum_sum + $divided_sum_sum + $divided_sum_sum;

            /* ---- */
            $bobot_climate          = $sum_climate / $sum_divided;
            $bobot_land             = $sum_land / $sum_divided;
            $bobot_accessibility    = $sum_accessibility / $sum_divided;
            /* ---- */

            /* ---- */
            $multiple_climate_climate_bobot         = $climate_climate * $bobot_climate;
            $multiple_climate_land_bobot            = $land_climate * $bobot_climate;
            $multiple_climate_accessibility_bobot   = $accessibility_climate * $bobot_climate;

            $multiple_land_climate_bobot        = $climate_land * $bobot_land;
            $multiple_land_land_bobot           = $land_land * $bobot_land;
            $multiple_land_accessibility_bobot  = $accessibility_land * $bobot_land;

            $multiple_accessibility_climate_bobot       = $climate_accessibility * $bobot_accessibility;
            $multiple_accessibility_land_bobot          = $land_accessibility * $bobot_accessibility;
            $multiple_accessibility_accessibility_bobot = $accessibility_accessibility * $bobot_accessibility;
            /* ---- */

            /* ---- */
            $sum_bobot_climate       = $multiple_climate_climate_bobot + $multiple_land_climate_bobot + $multiple_accessibility_climate_bobot;
            $sum_bobot_land          = $multiple_climate_land_bobot + $multiple_land_land_bobot + $multiple_accessibility_land_bobot;
            $sum_bobot_accessibility = $multiple_climate_accessibility_bobot + $multiple_land_accessibility_bobot + $multiple_accessibility_accessibility_bobot;
            /* ---- */

            $divided_bobot_climate          = $sum_bobot_climate / $bobot_climate;
            $divided_bobot_land             = $sum_bobot_land / $bobot_land;
            $divided_bobot_accessibility    = $sum_bobot_accessibility / $bobot_accessibility;

            /* ---- */
            $lamda_max                  = ($divided_bobot_climate + $divided_bobot_land + $divided_bobot_accessibility) / $sum_divided;
            $jumlah_factor              = $sum_divided;
            $consistensi_index          = ($lamda_max-$jumlah_factor)/($jumlah_factor-1);
            $rasio_index                = 0.58;
            $consistensi_rasio          = $consistensi_index / $rasio_index;
            /* ---- */

            if ($consistensi_rasio < 0.1) {
                $validation             = TRUE;
            }else{
                $validation             = FALSE;
            }

            return json_encode(['crfactor' => $consistensi_rasio, 'validation' => $validation]);
            
        }
    }

    public function actionCreate()
    {
        $model = new Advusr;
            if (Yii::$app->request->post()) {
                $skenario   = $_POST['Advusr']['skenario'];  
                /* Bagian Climate*/
                $ch_temp    = $_POST['Advusr']['ch_temp'];
                $temp_ch    = 1 / $ch_temp;
                $ch_ch      = 1;
                $temp_dm    = $_POST['Advusr']['temp_dm'];
                $dm_temp    = 1 / $temp_dm;
                $temp_temp  = 1;
                $ch_dm      = $_POST['Advusr']['ch_dm'];
                $dm_ch      = 1 / $ch_dm;
                $dm_dm      = 1;
                /* Bagian Land Non Peat*/
                $slope_text    = $_POST['Advusr']['slope_text'];
                $text_slope    = 1 / $slope_text;
                $slope_slope   = 1;
                $text_elev     = $_POST['Advusr']['text_elev'];
                $elev_text     = 1 / $text_elev;
                $text_text     = 1;
                $slope_elev    = $_POST['Advusr']['slope_elev'];
                $elev_slope    = 1 / $slope_elev;
                $elev_elev     = 1;
                /* Bagian Land Peat*/
                $slope_thick    = $_POST['Advusr']['slope_thick'];
                $thick_slope    = 1 / $slope_thick;
                $slope_slope    = 1;
                $thick_ripe     = $_POST['Advusr']['thick_ripe'];
                $ripe_thick     = 1 / $thick_ripe;
                $thick_thick    = 1;
                $slope_ripe     = $_POST['Advusr']['slope_ripe'];
                $ripe_slope     = 1 / $slope_ripe;
                $ripe_ripe      = 1;
                /* Bagian Accessibility*/
                $road_mills     = $_POST['Advusr']['road_mills'];
                $mills_road     = 1 / $road_mills;
                $road_road      = 1;
                $mills_town     = $_POST['Advusr']['mills_town'];
                $town_mills     = 1 / $mills_town;
                $mills_mills    = 1;
                $road_town      = $_POST['Advusr']['road_town'];
                $town_road      = 1 / $road_town;
                $town_town      = 1;
                /* Bagian Factors*/
                $climate_land                   = $_POST['Advusr']['climate_land'];
                $land_climate                   = 1 / $climate_land;
                $climate_climate                = 1;
                $land_accessibility             = $_POST['Advusr']['land_accessibility'];
                $accessibility_land             = 1 / $land_accessibility;
                $land_land                      = 1;
                $climate_accessibility          = $_POST['Advusr']['climate_accessibility'];
                $accessibility_climate          = 1 / $climate_accessibility;
                $accessibility_accessibility    = 1;

                /*  Bagian Climate
                    Ini adalah proses pengolahan bobot
                */
                        $sum_column_ch      = $ch_ch + $temp_ch + $dm_ch;
                        $sum_column_temp    = $ch_temp + $temp_temp + $dm_temp;
                        $sum_column_dm      = $ch_dm + $temp_dm + $dm_dm;


                        /* ---- */
                        $divided_clm_sum_sum        = $sum_column_ch / $sum_column_ch;

                        $divided_clm_ch_ch_sum      = $ch_ch / $sum_column_ch;
                        $divided_clm_ch_temp_sum    = $temp_ch / $sum_column_ch;
                        $divided_clm_ch_dm_sum      = $dm_ch / $sum_column_ch;

                        $divided_clm_temp_ch_sum    = $ch_temp / $sum_column_temp;
                        $divided_clm_temp_temp_sum  = $temp_temp / $sum_column_temp;
                        $divided_clm_temp_dm_sum    = $dm_temp / $sum_column_temp;

                        $divided_clm_dm_ch_sum      = $ch_dm / $sum_column_dm;
                        $divided_clm_dm_temp_sum    = $temp_dm / $sum_column_dm;
                        $divided_clm_dm_dm_sum      = $dm_dm / $sum_column_dm;
                        /* ---- */

                        $sum_ch             = $divided_clm_ch_ch_sum + $divided_clm_temp_ch_sum + $divided_clm_dm_ch_sum;
                        $sum_temp           = $divided_clm_ch_temp_sum + $divided_clm_temp_temp_sum + $divided_clm_dm_temp_sum;
                        $sum_dm             = $divided_clm_ch_dm_sum + $divided_clm_temp_dm_sum + $divided_clm_dm_dm_sum;
                        $sum_divided_clm        = $divided_clm_sum_sum + $divided_clm_sum_sum + $divided_clm_sum_sum;

                        /* ---- */
                        $bobot_ch           = $sum_ch / $sum_divided_clm;
                        $bobot_temp         = $sum_temp / $sum_divided_clm;
                        $bobot_dm           = $sum_dm / $sum_divided_clm;
                        /* ---- */
// print_r($bobot_temp);
// die;
                        /* ---- */
                        $multiple_ch_ch_bobot      = $ch_ch * $bobot_ch;
                        $multiple_ch_temp_bobot    = $temp_ch * $bobot_ch;
                        $multiple_ch_dm_bobot      = $dm_ch * $bobot_ch;

                        $multiple_temp_ch_bobot    = $ch_temp * $bobot_temp;
                        $multiple_temp_temp_bobot  = $temp_temp * $bobot_temp;
                        $multiple_temp_dm_bobot    = $dm_temp * $bobot_temp;

                        $multiple_dm_ch_bobot      = $ch_dm * $bobot_dm;
                        $multiple_dm_temp_bobot    = $temp_dm * $bobot_dm;
                        $multiple_dm_dm_bobot      = $dm_dm * $bobot_dm;
                        /* ---- */

                        /* ---- */
                        $sum_bobot_ch               = $multiple_ch_ch_bobot + $multiple_temp_ch_bobot + $multiple_dm_ch_bobot;
                        $sum_bobot_temp             = $multiple_ch_temp_bobot + $multiple_temp_temp_bobot + $multiple_dm_temp_bobot;
                        $sum_bobot_dm               = $multiple_ch_dm_bobot + $multiple_temp_dm_bobot + $multiple_dm_dm_bobot;
                        /* ---- */

                        $divided_clm_bobot_ch           = $sum_bobot_ch / $bobot_ch;
                        $divided_clm_bobot_temp         = $sum_bobot_temp / $bobot_temp;
                        $divided_clm_bobot_dm           = $sum_bobot_dm / $bobot_dm;

                        /* ---- */
                        $lamda_max_clm                  = ($divided_clm_bobot_ch + $divided_clm_bobot_temp + $divided_clm_bobot_dm) / $sum_divided_clm;
                        $jumlah_factor_clm              = $sum_divided_clm;
                        $consistensi_index_clm          = ($lamda_max_clm-$jumlah_factor_clm)/($jumlah_factor_clm-1);
                        $rasio_index_clm                = 0.58;
                        $consistensi_rasio_clm          = $consistensi_index_clm / $rasio_index_clm;
                        /* ---- */

                        if ($consistensi_rasio_clm < 0.1) {
                            $validation_clm             = TRUE;
                        }else{
                            $validation_clm             = FALSE;
                        }
                /*  Bagian Land Non Peat
                    Ini adalah proses pengolahan bobot
                */
                        $sum_column_slope      = $slope_slope + $text_slope + $elev_slope;
                        $sum_column_text    = $slope_text + $text_text + $elev_text;
                        $sum_column_elev      = $slope_elev + $text_elev + $elev_elev;


                        /* ---- */
                        $divided_lnp_sum_sum        = $sum_column_slope / $sum_column_slope;

                        $divided_lnp_slope_slope_sum      = $slope_slope / $sum_column_slope;
                        $divided_lnp_slope_text_sum    = $text_slope / $sum_column_slope;
                        $divided_lnp_slope_elev_sum      = $elev_slope / $sum_column_slope;

                        $divided_lnp_text_slope_sum    = $slope_text / $sum_column_text;
                        $divided_lnp_text_text_sum  = $text_text / $sum_column_text;
                        $divided_lnp_text_elev_sum    = $elev_text / $sum_column_text;

                        $divided_lnp_elev_slope_sum      = $slope_elev / $sum_column_elev;
                        $divided_lnp_elev_text_sum    = $text_elev / $sum_column_elev;
                        $divided_lnp_elev_elev_sum      = $elev_elev / $sum_column_elev;
                        /* ---- */

                        $sum_slopenp             = $divided_lnp_slope_slope_sum + $divided_lnp_text_slope_sum + $divided_lnp_elev_slope_sum;
                        $sum_text           = $divided_lnp_slope_text_sum + $divided_lnp_text_text_sum + $divided_lnp_elev_text_sum;
                        $sum_elev             = $divided_lnp_slope_elev_sum + $divided_lnp_text_elev_sum + $divided_lnp_elev_elev_sum;
                        $sum_divided_lnp        = $divided_lnp_sum_sum + $divided_lnp_sum_sum + $divided_lnp_sum_sum;

                        /* ---- */
                        $bobot_slopenp           = $sum_slopenp / $sum_divided_lnp;
                        $bobot_text         = $sum_text / $sum_divided_lnp;
                        $bobot_elev           = $sum_elev / $sum_divided_lnp;
                        /* ---- */

                        /* ---- */
                        $multiple_slope_slope_bobot      = $slope_slope * $bobot_slopenp;
                        $multiple_slope_text_bobot    = $text_slope * $bobot_slopenp;
                        $multiple_slope_elev_bobot      = $elev_slope * $bobot_slopenp;

                        $multiple_text_slope_bobot    = $slope_text * $bobot_text;
                        $multiple_text_text_bobot  = $text_text * $bobot_text;
                        $multiple_text_elev_bobot    = $elev_text * $bobot_text;

                        $multiple_elev_slope_bobot      = $slope_elev * $bobot_elev;
                        $multiple_elev_text_bobot    = $text_elev * $bobot_elev;
                        $multiple_elev_elev_bobot      = $elev_elev * $bobot_elev;
                        /* ---- */

                        /* ---- */
                        $sum_bobot_slopenp               = $multiple_slope_slope_bobot + $multiple_text_slope_bobot + $multiple_elev_slope_bobot;
                        $sum_bobot_text             = $multiple_slope_text_bobot + $multiple_text_text_bobot + $multiple_elev_text_bobot;
                        $sum_bobot_elev               = $multiple_slope_elev_bobot + $multiple_text_elev_bobot + $multiple_elev_elev_bobot;
                        /* ---- */

                        $divided_lnp_bobot_slope           = $sum_bobot_slopenp / $bobot_slopenp;
                        $divided_lnp_bobot_text         = $sum_bobot_text / $bobot_text;
                        $divided_lnp_bobot_elev           = $sum_bobot_elev / $bobot_elev;

                        /* ---- */
                        $lamda_max_lnp                  = ($divided_lnp_bobot_slope + $divided_lnp_bobot_text + $divided_lnp_bobot_elev) / $sum_divided_lnp;
                        $jumlah_factor_lnp              = $sum_divided_lnp;
                        $consistensi_index_lnp          = ($lamda_max_lnp-$jumlah_factor_lnp)/($jumlah_factor_lnp-1);
                        $rasio_index_lnp                = 0.58;
                        $consistensi_rasio_lnp          = $consistensi_index_lnp / $rasio_index_lnp;
                        /* ---- */

                        if ($consistensi_rasio_lnp < 0.1) {
                            $validation_lnp             = TRUE;
                        }else{
                            $validation_lnp             = FALSE;
                        }
                /*  Bagian Land Peat
                    Ini adalah proses pengolahan bobot
                */
                        $sum_column_slope      = $slope_slope + $thick_slope + $ripe_slope;
                        $sum_column_thick    = $slope_thick + $thick_thick + $ripe_thick;
                        $sum_column_ripe      = $slope_ripe + $thick_ripe + $ripe_ripe;


                        /* ---- */
                        $divided_lp_sum_sum        = $sum_column_slope / $sum_column_slope;

                        $divided_lp_slope_slope_sum      = $slope_slope / $sum_column_slope;
                        $divided_lp_slope_thick_sum    = $thick_slope / $sum_column_slope;
                        $divided_lp_slope_ripe_sum      = $ripe_slope / $sum_column_slope;

                        $divided_lp_thick_slope_sum    = $slope_thick / $sum_column_thick;
                        $divided_lp_thick_thick_sum  = $thick_thick / $sum_column_thick;
                        $divided_lp_thick_ripe_sum    = $ripe_thick / $sum_column_thick;

                        $divided_lp_ripe_slope_sum      = $slope_ripe / $sum_column_ripe;
                        $divided_lp_ripe_thick_sum    = $thick_ripe / $sum_column_ripe;
                        $divided_lp_ripe_ripe_sum      = $ripe_ripe / $sum_column_ripe;
                        /* ---- */

                        $sum_slopelp             = $divided_lp_slope_slope_sum + $divided_lp_thick_slope_sum + $divided_lp_ripe_slope_sum;
                        $sum_thick           = $divided_lp_slope_thick_sum + $divided_lp_thick_thick_sum + $divided_lp_ripe_thick_sum;
                        $sum_ripe             = $divided_lp_slope_ripe_sum + $divided_lp_thick_ripe_sum + $divided_lp_ripe_ripe_sum;
                        $sum_divided_lp        = $divided_lp_sum_sum + $divided_lp_sum_sum + $divided_lp_sum_sum;

                        /* ---- */
                        $bobot_slopelp           = $sum_slopelp / $sum_divided_lp;
                        $bobot_thick         = $sum_thick / $sum_divided_lp;
                        $bobot_ripe           = $sum_ripe / $sum_divided_lp;
                        /* ---- */

                        /* ---- */
                        $multiple_slope_slope_bobot      = $slope_slope * $bobot_slopelp;
                        $multiple_slope_thick_bobot    = $thick_slope * $bobot_slopelp;
                        $multiple_slope_ripe_bobot      = $ripe_slope * $bobot_slopelp;

                        $multiple_thick_slope_bobot    = $slope_thick * $bobot_thick;
                        $multiple_thick_thick_bobot  = $thick_thick * $bobot_thick;
                        $multiple_thick_ripe_bobot    = $ripe_thick * $bobot_thick;

                        $multiple_ripe_slope_bobot      = $slope_ripe * $bobot_ripe;
                        $multiple_ripe_thick_bobot    = $thick_ripe * $bobot_ripe;
                        $multiple_ripe_ripe_bobot      = $ripe_ripe * $bobot_ripe;
                        /* ---- */

                        /* ---- */
                        $sum_bobot_slopelp               = $multiple_slope_slope_bobot + $multiple_thick_slope_bobot + $multiple_ripe_slope_bobot;
                        $sum_bobot_thick             = $multiple_slope_thick_bobot + $multiple_thick_thick_bobot + $multiple_ripe_thick_bobot;
                        $sum_bobot_ripe               = $multiple_slope_ripe_bobot + $multiple_thick_ripe_bobot + $multiple_ripe_ripe_bobot;
                        /* ---- */

                        $divided_lp_bobot_slope           = $sum_bobot_slopelp / $bobot_slopelp;
                        $divided_lp_bobot_thick         = $sum_bobot_thick / $bobot_thick;
                        $divided_lp_bobot_ripe           = $sum_bobot_ripe / $bobot_ripe;

                        /* ---- */
                        $lamda_max_lp                  = ($divided_lp_bobot_slope + $divided_lp_bobot_thick + $divided_lp_bobot_ripe) / $sum_divided_lp;
                        $jumlah_factor_lp              = $sum_divided_lp;
                        $consistensi_index_lp          = ($lamda_max_lp-$jumlah_factor_lp)/($jumlah_factor_lp-1);
                        $rasio_index_lp                = 0.58;
                        $consistensi_rasio_lp          = $consistensi_index_lp / $rasio_index_lp;
                        /* ---- */

                        if ($consistensi_rasio_lp < 0.1) {
                            $validation_lp             = TRUE;
                        }else{
                            $validation_lp             = FALSE;
                        }
                /*  Bagian Accessibility
                    Ini adalah proses pengolahan bobot
                */
                        $sum_column_road      = $road_road + $mills_road + $town_road;
                        $sum_column_mills    = $road_mills + $mills_mills + $town_mills;
                        $sum_column_town      = $road_town + $mills_town + $town_town;


                        /* ---- */
                        $divided_acc_sum_sum        = $sum_column_road / $sum_column_road;

                        $divided_acc_road_road_sum      = $road_road / $sum_column_road;
                        $divided_acc_road_mills_sum    = $mills_road / $sum_column_road;
                        $divided_acc_road_town_sum      = $town_road / $sum_column_road;

                        $divided_acc_mills_road_sum    = $road_mills / $sum_column_mills;
                        $divided_acc_mills_mills_sum  = $mills_mills / $sum_column_mills;
                        $divided_acc_mills_town_sum    = $town_mills / $sum_column_mills;

                        $divided_acc_town_road_sum      = $road_town / $sum_column_town;
                        $divided_acc_town_mills_sum    = $mills_town / $sum_column_town;
                        $divided_acc_town_town_sum      = $town_town / $sum_column_town;
                        /* ---- */

                        $sum_road             = $divided_acc_road_road_sum + $divided_acc_mills_road_sum + $divided_acc_town_road_sum;
                        $sum_mills           = $divided_acc_road_mills_sum + $divided_acc_mills_mills_sum + $divided_acc_town_mills_sum;
                        $sum_town             = $divided_acc_road_town_sum + $divided_acc_mills_town_sum + $divided_acc_town_town_sum;
                        $sum_divided_acc        = $divided_acc_sum_sum + $divided_acc_sum_sum + $divided_acc_sum_sum;

                        /* ---- */
                        $bobot_road           = $sum_road / $sum_divided_acc;
                        $bobot_mills         = $sum_mills / $sum_divided_acc;
                        $bobot_town           = $sum_town / $sum_divided_acc;
                        /* ---- */

                        /* ---- */
                        $multiple_road_road_bobot      = $road_road * $bobot_road;
                        $multiple_road_mills_bobot    = $mills_road * $bobot_road;
                        $multiple_road_town_bobot      = $town_road * $bobot_road;

                        $multiple_mills_road_bobot    = $road_mills * $bobot_mills;
                        $multiple_mills_mills_bobot  = $mills_mills * $bobot_mills;
                        $multiple_mills_town_bobot    = $town_mills * $bobot_mills;

                        $multiple_town_road_bobot      = $road_town * $bobot_town;
                        $multiple_town_mills_bobot    = $mills_town * $bobot_town;
                        $multiple_town_town_bobot      = $town_town * $bobot_town;
                        /* ---- */

                        /* ---- */
                        $sum_bobot_road               = $multiple_road_road_bobot + $multiple_mills_road_bobot + $multiple_town_road_bobot;
                        $sum_bobot_mills             = $multiple_road_mills_bobot + $multiple_mills_mills_bobot + $multiple_town_mills_bobot;
                        $sum_bobot_town               = $multiple_road_town_bobot + $multiple_mills_town_bobot + $multiple_town_town_bobot;
                        /* ---- */

                        $divided_acc_bobot_road           = $sum_bobot_road / $bobot_road;
                        $divided_acc_bobot_mills         = $sum_bobot_mills / $bobot_mills;
                        $divided_acc_bobot_town           = $sum_bobot_town / $bobot_town;

                        /* ---- */
                        $lamda_max_acc                  = ($divided_acc_bobot_road + $divided_acc_bobot_mills + $divided_acc_bobot_town) / $sum_divided_acc;
                        $jumlah_factor_acc              = $sum_divided_acc;
                        $consistensi_index_acc          = ($lamda_max_acc-$jumlah_factor_acc)/($jumlah_factor_acc-1);
                        $rasio_index_acc                = 0.58;
                        $consistensi_rasio_acc          = $consistensi_index_acc / $rasio_index_acc;
                        /* ---- */

                        if ($consistensi_rasio_acc < 0.1) {
                            $validation_acc             = TRUE;
                        }else{
                            $validation_acc             = FALSE;
                        }           
                /*  Bagian Factors
                    Ini adalah proses pengolahan bobot
                */
                        $sum_column_climate      = $climate_climate + $land_climate + $accessibility_climate;
                        $sum_column_land    = $climate_land + $land_land + $accessibility_land;
                        $sum_column_accessibility      = $climate_accessibility + $land_accessibility + $accessibility_accessibility;


                        /* ---- */
                        $divided_fac_sum_sum        = $sum_column_climate / $sum_column_climate;

                        $divided_fac_climate_climate_sum      = $climate_climate / $sum_column_climate;
                        $divided_fac_climate_land_sum    = $land_climate / $sum_column_climate;
                        $divided_fac_climate_accessibility_sum      = $accessibility_climate / $sum_column_climate;

                        $divided_fac_land_climate_sum    = $climate_land / $sum_column_land;
                        $divided_fac_land_land_sum  = $land_land / $sum_column_land;
                        $divided_fac_land_accessibility_sum    = $accessibility_land / $sum_column_land;

                        $divided_fac_accessibility_climate_sum      = $climate_accessibility / $sum_column_accessibility;
                        $divided_fac_accessibility_land_sum    = $land_accessibility / $sum_column_accessibility;
                        $divided_fac_accessibility_accessibility_sum      = $accessibility_accessibility / $sum_column_accessibility;
                        /* ---- */

                        $sum_climate             = $divided_fac_climate_climate_sum + $divided_fac_land_climate_sum + $divided_fac_accessibility_climate_sum;
                        $sum_land           = $divided_fac_climate_land_sum + $divided_fac_land_land_sum + $divided_fac_accessibility_land_sum;
                        $sum_accessibility             = $divided_fac_climate_accessibility_sum + $divided_fac_land_accessibility_sum + $divided_fac_accessibility_accessibility_sum;
                        $sum_divided_fac        = $divided_fac_sum_sum + $divided_fac_sum_sum + $divided_fac_sum_sum;

                        /* ---- */
                        $bobot_climate           = $sum_climate / $sum_divided_fac;
                        $bobot_land         = $sum_land / $sum_divided_fac;
                        $bobot_accessibility           = $sum_accessibility / $sum_divided_fac;
                        /* ---- */

                        /* ---- */
                        $multiple_climate_climate_bobot      = $climate_climate * $bobot_climate;
                        $multiple_climate_land_bobot    = $land_climate * $bobot_climate;
                        $multiple_climate_accessibility_bobot      = $accessibility_climate * $bobot_climate;

                        $multiple_land_climate_bobot    = $climate_land * $bobot_land;
                        $multiple_land_land_bobot  = $land_land * $bobot_land;
                        $multiple_land_accessibility_bobot    = $accessibility_land * $bobot_land;

                        $multiple_accessibility_climate_bobot      = $climate_accessibility * $bobot_accessibility;
                        $multiple_accessibility_land_bobot    = $land_accessibility * $bobot_accessibility;
                        $multiple_accessibility_accessibility_bobot      = $accessibility_accessibility * $bobot_accessibility;
                        /* ---- */

                        /* ---- */
                        $sum_bobot_climate               = $multiple_climate_climate_bobot + $multiple_land_climate_bobot + $multiple_accessibility_climate_bobot;
                        $sum_bobot_land             = $multiple_climate_land_bobot + $multiple_land_land_bobot + $multiple_accessibility_land_bobot;
                        $sum_bobot_accessibility               = $multiple_climate_accessibility_bobot + $multiple_land_accessibility_bobot + $multiple_accessibility_accessibility_bobot;
                        /* ---- */

                        $divided_fac_bobot_climate           = $sum_bobot_climate / $bobot_climate;
                        $divided_fac_bobot_land         = $sum_bobot_land / $bobot_land;
                        $divided_fac_bobot_accessibility           = $sum_bobot_accessibility / $bobot_accessibility;

                        /* ---- */
                        $lamda_max_fac                  = ($divided_fac_bobot_climate + $divided_fac_bobot_land + $divided_fac_bobot_accessibility) / $sum_divided_fac;
                        $jumlah_factor_fac              = $sum_divided_fac;
                        $consistensi_index_fac          = ($lamda_max_fac-$jumlah_factor_fac)/($jumlah_factor_fac-1);
                        $rasio_index_fac                = 0.58;
                        $consistensi_rasio_fac          = $consistensi_index_fac / $rasio_index_fac;
                        /* ---- */

                        if ($consistensi_rasio_fac < 0.1) {
                            $validation_fac             = TRUE;
                        }else{
                            $validation_fac             = FALSE;
                        }
                /*  
                    Bagian ini variabel yang telah dibentuk akan di post ke database 
                */

                $_POST['Advusr']['skenario']                = $skenario;
                /* Bagian Climate*/
                $_POST['Advusr']['ch_temp']                 = $ch_temp;
                $_POST['Advusr']['ch_dm']                   = $ch_dm;
                $_POST['Advusr']['temp_dm']                 = $temp_dm;
                $_POST['Advusr']['bobot_ch']                = $bobot_ch;
                $_POST['Advusr']['bobot_temp']              = $bobot_temp;
                $_POST['Advusr']['bobot_dm']                = $bobot_dm;
                $_POST['Advusr']['cr_climate']              = $consistensi_rasio_clm;
                $_POST['Advusr']['validation_climate']      = $validation_clm;
                /* Bagian Land Non Peat*/
                $_POST['Advusr']['slope_text']              = $slope_text;
                $_POST['Advusr']['slope_elev']              = $slope_elev;
                $_POST['Advusr']['text_elev']               = $text_elev;
                $_POST['Advusr']['bobot_slopenp']           = $bobot_slopenp;
                $_POST['Advusr']['bobot_text']              = $bobot_text;
                $_POST['Advusr']['bobot_elev']              = $bobot_elev;
                $_POST['Advusr']['cr_landnpeat']            = $consistensi_rasio_lnp;
                $_POST['Advusr']['validation_landnpeat']    = $validation_lnp;
                /* Bagian Land Peat*/
                $_POST['Advusr']['slope_thick']             = $slope_thick;
                $_POST['Advusr']['slope_ripe']              = $slope_ripe;
                $_POST['Advusr']['thick_ripe']              = $thick_ripe;
                $_POST['Advusr']['bobot_slopep']            = $bobot_slopelp;
                $_POST['Advusr']['bobot_thick']             = $bobot_thick;
                $_POST['Advusr']['bobot_ripe']              = $bobot_ripe;
                $_POST['Advusr']['cr_landpeat']             = $consistensi_rasio_lp;
                $_POST['Advusr']['validation_landpeat']     = $validation_lp;
                /* Bagian Accessibility*/
                $_POST['Advusr']['road_mills']                          = $road_mills;
                $_POST['Advusr']['road_town']                           = $road_town;
                $_POST['Advusr']['mills_town']                          = $mills_town;
                $_POST['Advusr']['bobot_road']                          = $bobot_road;
                $_POST['Advusr']['bobot_mills']                         = $bobot_mills;
                $_POST['Advusr']['bobot_town']                          = $bobot_town;
                $_POST['Advusr']['cr_accessibility']                    = $consistensi_rasio_acc;
                $_POST['Advusr']['validation_accessibility']            = $validation_acc;
                /* Bagian Factors*/
                $_POST['Advusr']['climate_land']                        = $climate_land;
                $_POST['Advusr']['climate_accessibility']               = $climate_accessibility;
                $_POST['Advusr']['land_accessibility']                  = $land_accessibility;
                $_POST['Advusr']['bobot_climate']                       = $bobot_climate;
                $_POST['Advusr']['bobot_land']                          = $bobot_land;
                $_POST['Advusr']['bobot_accessibility']                 = $bobot_accessibility;
                $_POST['Advusr']['cr_factors']                          = $consistensi_rasio_fac;
                $_POST['Advusr']['validation_factors']                  = $validation_fac;
                /* Bagian DLL*/                
                $_POST['Advusr']['id_user']                             = Yii::$app->user->getId();


                if ($model->load($_POST) && $model->save()) {                     
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            } else {
            return $this->render('create', [
                'model' => $model,
                ]);
            }    
    }

    /**
     * Updates an existing Advusr model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Advusr model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Advusr model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Advusr the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Advusr::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
