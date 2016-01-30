<?php

namespace app\controllers;

use Yii;
use app\models\Land;
use app\models\LandSearch;
use app\models\LandAG;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LandController implements the CRUD actions for Land model.
 */
class LandController extends Controller
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
     * Lists all Land models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LandSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Land model.
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
     * Creates a new Land model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Land();

        if (Yii::$app->request->post()) {

            $text_slope    = $_POST['Land']['text_slope'];
            $slope_text    = 1 / $text_slope;
            $text_text      = 1;

            $slope_thick    = $_POST['Land']['slope_thick'];
            $thick_slope    = 1 / $slope_thick;
            $slope_slope  = 1;

            $text_thick      = $_POST['Land']['text_thick'];
            $thick_text      = 1 / $text_thick;
            $thick_thick      = 1;

            $text_ripe      = $_POST['Land']['text_ripe'];
            $ripe_text      = 1 / $text_ripe;

            $slope_ripe      = $_POST['Land']['slope_ripe'];
            $ripe_slope      = 1 / $slope_ripe;

            $thick_ripe      = $_POST['Land']['thick_ripe'];
            $ripe_thick      = 1 / $thick_ripe;
            $ripe_ripe      = 1;

            
            $sum_column_text      = $text_text + $slope_text + $thick_text + $ripe_text;
            $sum_column_slope    = $text_slope + $slope_slope + $thick_slope + $ripe_slope;
            $sum_column_thick      = $text_thick + $slope_thick + $thick_thick + $ripe_thick;
            $sum_column_ripe      = $text_ripe + $slope_ripe + $thick_ripe + $ripe_ripe;


            /* ---- */
            $divided_sum_sum        = $sum_column_text / $sum_column_text;

            $divided_text_text_sum      = $text_text / $sum_column_text;
            $divided_text_slope_sum    = $slope_text / $sum_column_text;
            $divided_text_thick_sum      = $thick_text / $sum_column_text;
            $divided_text_ripe_sum      = $ripe_text / $sum_column_text;

            $divided_slope_text_sum    = $text_slope / $sum_column_slope;
            $divided_slope_slope_sum  = $slope_slope / $sum_column_slope;
            $divided_slope_thick_sum    = $thick_slope / $sum_column_slope;
            $divided_slope_ripe_sum    = $ripe_slope / $sum_column_slope;

            $divided_thick_text_sum      = $text_thick / $sum_column_thick;
            $divided_thick_slope_sum    = $slope_thick / $sum_column_thick;
            $divided_thick_thick_sum      = $thick_thick / $sum_column_thick;
            $divided_thick_ripe_sum      = $ripe_thick / $sum_column_thick;

            $divided_ripe_text_sum      = $text_ripe / $sum_column_ripe;
            $divided_ripe_slope_sum    = $slope_ripe / $sum_column_ripe;
            $divided_ripe_thick_sum      = $thick_ripe / $sum_column_ripe;
            $divided_ripe_ripe_sum      = $ripe_ripe / $sum_column_ripe;

            /* ---- */

            $sum_text             = $divided_text_text_sum + $divided_slope_text_sum + $divided_thick_text_sum + $divided_ripe_text_sum;
            $sum_slope           = $divided_text_slope_sum + $divided_slope_slope_sum + $divided_thick_slope_sum + $divided_ripe_slope_sum;
            $sum_thick             = $divided_text_thick_sum + $divided_slope_thick_sum + $divided_thick_thick_sum + $divided_ripe_thick_sum;
            $sum_ripe             = $divided_text_ripe_sum + $divided_slope_ripe_sum + $divided_thick_ripe_sum + $divided_ripe_ripe_sum;

            $sum_divided        = $divided_sum_sum + $divided_sum_sum + $divided_sum_sum + $divided_sum_sum;

            /* ---- */
            $bobot_text           = $sum_text / $sum_divided;
            $bobot_slope         = $sum_slope / $sum_divided;
            $bobot_thick           = $sum_thick / $sum_divided;
            $bobot_ripe           = $sum_ripe / $sum_divided; 
            /* ---- */

            /* ---- */
            $multiple_text_text_bobot      = $text_text * $bobot_text;
            $multiple_text_slope_bobot    = $slope_text * $bobot_text;
            $multiple_text_thick_bobot      = $thick_text * $bobot_text;
            $multiple_text_ripe_bobot      = $ripe_text * $bobot_text;

            $multiple_slope_text_bobot    = $text_slope * $bobot_slope;
            $multiple_slope_slope_bobot  = $slope_slope * $bobot_slope;
            $multiple_slope_thick_bobot    = $thick_slope * $bobot_slope;
            $multiple_slope_ripe_bobot    = $ripe_slope * $bobot_slope;

            $multiple_thick_text_bobot      = $text_thick * $bobot_thick;
            $multiple_thick_slope_bobot    = $slope_thick * $bobot_thick;
            $multiple_thick_thick_bobot      = $thick_thick * $bobot_thick;
            $multiple_thick_ripe_bobot      = $ripe_thick * $bobot_thick;

            $multiple_ripe_text_bobot      = $text_ripe * $bobot_ripe;
            $multiple_ripe_slope_bobot    = $slope_ripe * $bobot_ripe;
            $multiple_ripe_thick_bobot      = $thick_ripe * $bobot_ripe;
            $multiple_ripe_ripe_bobot      = $ripe_ripe * $bobot_ripe;
            /* ---- */

            /* ---- */
            $sum_bobot_text               = $multiple_text_text_bobot + $multiple_slope_text_bobot + $multiple_thick_text_bobot + $multiple_ripe_text_bobot;
            $sum_bobot_slope             = $multiple_text_slope_bobot + $multiple_slope_slope_bobot + $multiple_thick_slope_bobot + $multiple_ripe_slope_bobot;
            $sum_bobot_thick               = $multiple_text_thick_bobot + $multiple_slope_thick_bobot + $multiple_thick_thick_bobot + $multiple_ripe_thick_bobot;
            $sum_bobot_ripe               = $multiple_text_ripe_bobot + $multiple_slope_ripe_bobot + $multiple_thick_ripe_bobot + $multiple_ripe_ripe_bobot;
            /* ---- */

            $divided_bobot_text           = $sum_bobot_text / $bobot_text;
            $divided_bobot_slope         = $sum_bobot_slope / $bobot_slope;
            $divided_bobot_thick           = $sum_bobot_thick / $bobot_thick;
            $divided_bobot_ripe           = $sum_bobot_ripe / $bobot_ripe;


            /* ---- */
            $lamda_max                  = ($divided_bobot_text + $divided_bobot_slope + $divided_bobot_thick + $divided_bobot_ripe) / $sum_divided;
            $jumlah_factor              = $sum_divided;
            $consistensi_index          = ($lamda_max-$jumlah_factor)/($jumlah_factor-1);
            $rasio_index                = 0.9;
            $consistensi_rasio          = $consistensi_index / $rasio_index;


            /* ---- */

            if ($consistensi_rasio < 0.1) {
                $validation             = TRUE;
            }else{
                $validation             = FALSE;
            }

            if (Yii::$app->user->getId()) {
                $_POST['Land']['text_slope']    = $text_slope;
                $_POST['Land']['text_thick']      = $text_thick;
                $_POST['Land']['text_ripe']      = $text_ripe;
                $_POST['Land']['slope_thick']    = $slope_thick;
                $_POST['Land']['slope_ripe']    = $slope_ripe;
                $_POST['Land']['thick_ripe']    = $thick_ripe;
                $_POST['Land']['bobot_text']   = $bobot_text;
                $_POST['Land']['bobot_slope'] = $bobot_slope;
                $_POST['Land']['bobot_thick']   = $bobot_thick;
                $_POST['Land']['bobot_ripe']   = $bobot_ripe;
                $_POST['Land']['cr']         = $consistensi_rasio;
                $_POST['Land']['validation'] = $validation;
                $_POST['Land']['id_user']    = Yii::$app->user->getId();

                if ($model->load($_POST) && $model->save()) {

                    $data_access                      = Land::find()->where(['validation'=> TRUE])->AsArray()->All();

                    $text_slope_ag_base                    = [];
                    $text_thick_ag_base                      = [];
                    $text_ripe_ag_base                      = [];
                    $slope_thick_ag_base                    = [];
                    $slope_ripe_ag_base                    = [];
                    $thick_ripe_ag_base                    = [];
                    $bobot_text_ag_base                   = [];
                    $bobot_slope_ag_base                 = [];
                    $bobot_thick_ag_base                   = [];
                    $bobot_ripe_ag_base                   = [];
                    $consistensi_rasio_ag_base          = [];

                    for ($i=0; $i < count($data_access); $i++) { 
                        $text_slope_ag_base[$i]            = $data_access[$i]['text_slope'];
                        $text_thick_ag_base[$i]              = $data_access[$i]['text_thick'];
                        $text_ripe_ag_base[$i]              = $data_access[$i]['text_ripe'];
                        $slope_thick_ag_base[$i]            = $data_access[$i]['slope_thick'];
                        $slope_ripe_ag_base[$i]            = $data_access[$i]['slope_ripe'];
                        $thick_ripe_ag_base[$i]            = $data_access[$i]['thick_ripe'];
                        $bobot_text_ag_base[$i]           = $data_access[$i]['bobot_text'];
                        $bobot_slope_ag_base[$i]         = $data_access[$i]['bobot_slope'];
                        $bobot_thick_ag_base[$i]           = $data_access[$i]['bobot_thick'];
                        $bobot_ripe_ag_base[$i]           = $data_access[$i]['bobot_ripe'];
                        $consistensi_rasio_ag_base[$i]  = $data_access[$i]['cr'];
                    }

                    $text_slope_ag                         = sqrt (array_product($text_slope_ag_base));
                    $text_thick_ag                           = sqrt (array_product($text_thick_ag_base));
                    $text_ripe_ag                           = sqrt (array_product($text_ripe_ag_base));
                    $slope_thick_ag                         = sqrt (array_product($slope_thick_ag_base));
                    $slope_ripe_ag                         = sqrt (array_product($slope_ripe_ag_base));
                    $thick_ripe_ag                         = sqrt (array_product($thick_ripe_ag_base));
                    $bobot_text_ag                        = sqrt (array_product($bobot_text_ag_base));
                    $bobot_slope_ag                      = sqrt (array_product($bobot_slope_ag_base));
                    $bobot_thick_ag                        = sqrt (array_product($bobot_thick_ag_base));
                    $bobot_ripe_ag                        = sqrt (array_product($bobot_ripe_ag_base));
                    $consistensi_rasio_ag               = sqrt (array_product($consistensi_rasio_ag_base));

                    $model_ag                           = new LandAG();

                    $_POSTAG['LandAG']['text_slope']      = $text_slope_ag;
                    $_POSTAG['LandAG']['text_thick']        = $text_thick_ag;
                    $_POSTAG['LandAG']['text_ripe']        = $text_ripe_ag;
                    $_POSTAG['LandAG']['slope_thick']      = $slope_thick_ag;
                    $_POSTAG['LandAG']['slope_ripe']      = $slope_ripe_ag;
                    $_POSTAG['LandAG']['thick_ripe']      = $thick_ripe_ag;
                    $_POSTAG['LandAG']['bobot_text']     = $bobot_text_ag;
                    $_POSTAG['LandAG']['bobot_slope']   = $bobot_slope_ag;
                    $_POSTAG['LandAG']['bobot_thick']     = $bobot_thick_ag;
                    $_POSTAG['LandAG']['bobot_ripe']     = $bobot_ripe_ag;
                    $_POSTAG['LandAG']['cr']           = $consistensi_rasio_ag;

                    if ($model_ag->load($_POSTAG) && $model_ag->save()) {
                        
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
     * Updates an existing Land model.
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
     * Deletes an existing Land model.
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
     * Finds the Land model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Land the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Land::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
