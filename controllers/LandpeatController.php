<?php

namespace app\controllers;

use Yii;
use app\models\Landpeat;
use app\models\LandpeatSearch;
use app\models\LandpeatAG;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LandpeatController implements the CRUD actions for Landpeat model.
 */
class LandpeatController extends Controller
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
     * Lists all Landpeat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LandpeatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Landpeat model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    
    public function actionCr(){
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


            return json_encode(['cr' => $consistensi_rasio, 'validation' => $validation]);
            
        }
    }
    /**
     * Creates a new Landpeat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Landpeat();

        if (Yii::$app->request->post()) {

            $slope_thick    = $_POST['Landpeat']['slope_thick'];
            $thick_slope    = 1 / $slope_thick;
            $slope_slope      = 1;


            $thick_ripe    = $_POST['Landpeat']['thick_ripe'];
            $ripe_thick    = 1 / $thick_ripe;
            $thick_thick  = 1;

            $slope_ripe      = $_POST['Landpeat']['slope_ripe'];
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


            if (Yii::$app->user->getId()) {
                $_POST['Landpeat']['slope_thick']    = $slope_thick;
                $_POST['Landpeat']['slope_ripe']      = $slope_ripe;
                $_POST['Landpeat']['thick_ripe']    = $thick_ripe;
                $_POST['Landpeat']['bobot_slope']   = $bobot_slope;
                $_POST['Landpeat']['bobot_thick'] = $bobot_thick;
                $_POST['Landpeat']['bobot_ripe']   = $bobot_ripe;
                $_POST['Landpeat']['cr']         = $consistensi_rasio;
                $_POST['Landpeat']['validation'] = $validation;
                $_POST['Landpeat']['id_user']    = Yii::$app->user->getId();

                if ($model->load($_POST) && $model->save()) {

                    $data_landpeats                      = Landpeat::find()->where(['validation'=> TRUE])->AsArray()->All();

                    $slope_thick_ag_base                    = [];
                    $slope_ripe_ag_base                      = [];
                    $thick_ripe_ag_base                    = [];
                    $bobot_slope_ag_base                   = [];
                    $bobot_thick_ag_base                 = [];
                    $bobot_ripe_ag_base                   = [];
                    $consistensi_rasio_ag_base          = [];

                    for ($i=0; $i < count($data_landpeats); $i++) { 
                        $slope_thick_ag_base[$i]            = $data_landpeats[$i]['slope_thick'];
                        $slope_ripe_ag_base[$i]              = $data_landpeats[$i]['slope_ripe'];
                        $thick_ripe_ag_base[$i]            = $data_landpeats[$i]['thick_ripe'];
                        // $bobot_slope_ag_base[$i]           = $data_landpeats[$i]['bobot_slope'];
                        // $bobot_thick_ag_base[$i]         = $data_landpeats[$i]['bobot_thick'];
                        // $bobot_ripe_ag_base[$i]           = $data_landpeats[$i]['bobot_ripe'];
                        // $consistensi_rasio_ag_base[$i]  = $data_landpeats[$i]['cr'];
                    }

                    $slope_thick_ag                         = pow(array_product($slope_thick_ag_base),1/count($data_landpeats));
                    $thick_slope_ag                         = 1/$slope_thick_ag;
                    $slope_slope_ag                         = 1;


                    $slope_ripe_ag                          = pow(array_product($slope_ripe_ag_base),1/count($data_landpeats));
                    $ripe_slope_ag                          = 1/$slope_ripe_ag;
                    $ripe_ripe_ag                           = 1;
                    

                    $thick_ripe_ag                          = pow(array_product($thick_ripe_ag_base),1/count($data_landpeats));
                    $ripe_thick_ag                          = 1/$thick_ripe_ag;
                    $thick_thick_ag                         = 1;
                  


                    // $bobot_slope_ag                        = sqrt (array_product($bobot_slope_ag_base));
                    // $bobot_thick_ag                      = sqrt (array_product($bobot_thick_ag_base));
                    // $bobot_ripe_ag                        = sqrt (array_product($bobot_ripe_ag_base));
                    // $consistensi_rasio_ag               = sqrt (array_product($consistensi_rasio_ag_base));
                    
                    $sum_column_slope_ag      = $slope_slope_ag + $thick_slope_ag + $ripe_slope_ag;
                    $sum_column_thick_ag    = $slope_thick_ag + $thick_thick_ag + $ripe_thick_ag;
                    $sum_column_ripe_ag      = $slope_ripe_ag + $thick_ripe_ag + $ripe_ripe_ag;


                    /* ---- */
                    $divided_sum_sum_ag        = $sum_column_slope_ag / $sum_column_slope_ag;

                    $divided_slope_slope_ag_sum      = $slope_slope_ag / $sum_column_slope_ag;
                    $divided_slope_thick_ag_sum    = $thick_slope_ag / $sum_column_slope_ag;
                    $divided_slope_ripe_ag_sum      = $ripe_slope_ag / $sum_column_slope_ag;

                    $divided_thick_slope_ag_sum    = $slope_thick_ag / $sum_column_thick_ag;
                    $divided_thick_thick_ag_sum  = $thick_thick_ag / $sum_column_thick_ag;
                    $divided_thick_ripe_ag_sum    = $ripe_thick_ag / $sum_column_thick_ag;

                    $divided_ripe_slope_ag_sum      = $slope_ripe_ag / $sum_column_ripe_ag;
                    $divided_ripe_thick_ag_sum    = $thick_ripe_ag / $sum_column_ripe_ag;
                    $divided_ripe_ripe_ag_sum      = $ripe_ripe_ag / $sum_column_ripe_ag;
                    /* ---- */

                    $sum_slope_ag             = $divided_slope_slope_ag_sum + $divided_thick_slope_ag_sum + $divided_ripe_slope_ag_sum;
                    $sum_thick_ag           = $divided_slope_thick_ag_sum + $divided_thick_thick_ag_sum + $divided_ripe_thick_ag_sum;
                    $sum_ripe_ag             = $divided_slope_ripe_ag_sum + $divided_thick_ripe_ag_sum + $divided_ripe_ripe_ag_sum;
                    $sum_divided_ag        = $divided_sum_sum_ag + $divided_sum_sum_ag + $divided_sum_sum_ag;

                    /* ---- */
                    $bobot_slope_ag           = $sum_slope_ag / $sum_divided_ag;
                    $bobot_thick_ag         = $sum_thick_ag / $sum_divided_ag;
                    $bobot_ripe_ag           = $sum_ripe_ag / $sum_divided_ag;
                    /* ---- */

                    /* ---- */
                    $multiple_slope_slope_ag_bobot      = $slope_slope_ag * $bobot_slope_ag;
                    $multiple_slope_thick_ag_bobot    = $thick_slope_ag * $bobot_slope_ag;
                    $multiple_slope_ripe_ag_bobot      = $ripe_slope_ag * $bobot_slope_ag;

                    $multiple_thick_slope_ag_bobot    = $slope_thick_ag * $bobot_thick_ag;
                    $multiple_thick_thick_ag_bobot  = $thick_thick_ag * $bobot_thick_ag;
                    $multiple_thick_ripe_ag_bobot    = $ripe_thick_ag * $bobot_thick_ag;

                    $multiple_ripe_slope_ag_bobot      = $slope_ripe_ag * $bobot_ripe_ag;
                    $multiple_ripe_thick_ag_bobot    = $thick_ripe_ag * $bobot_ripe_ag;
                    $multiple_ripe_ripe_ag_bobot      = $ripe_ripe_ag * $bobot_ripe_ag;
                    /* ---- */

                    /* ---- */
                    $sum_bobot_slope_ag               = $multiple_slope_slope_ag_bobot + $multiple_thick_slope_ag_bobot + $multiple_ripe_slope_ag_bobot;
                    $sum_bobot_thick_ag             = $multiple_slope_thick_ag_bobot + $multiple_thick_thick_ag_bobot + $multiple_ripe_thick_ag_bobot;
                    $sum_bobot_ripe_ag               = $multiple_slope_ripe_ag_bobot + $multiple_thick_ripe_ag_bobot + $multiple_ripe_ripe_ag_bobot;
                    /* ---- */

                    $divided_bobot_slope_ag           = $sum_bobot_slope_ag / $bobot_slope_ag;
                    $divided_bobot_thick_ag         = $sum_bobot_thick_ag / $bobot_thick_ag;
                    $divided_bobot_ripe_ag           = $sum_bobot_ripe_ag / $bobot_ripe_ag;

                    /* ---- */
                    $lamda_max_ag                  = ($divided_bobot_slope_ag + $divided_bobot_thick_ag + $divided_bobot_ripe_ag) / $sum_divided_ag;
                    $jumlah_factor_ag              = $sum_divided_ag;
                    $consistensi_index_ag          = ($lamda_max_ag-$jumlah_factor_ag)/($jumlah_factor_ag-1);
                    $rasio_index_ag                = 0.58;
                    $consistensi_rasio_ag          = $consistensi_index_ag / $rasio_index_ag;
                    /* ---- */                    

                    $model_ag                           = new LandpeatAG();

                    $_POSTAG['LandpeatAG']['slope_thick']      = $slope_thick_ag;
                    $_POSTAG['LandpeatAG']['slope_ripe']        = $slope_ripe_ag;
                    $_POSTAG['LandpeatAG']['thick_ripe']      = $thick_ripe_ag;
                    $_POSTAG['LandpeatAG']['bobot_slope']     = $bobot_slope_ag;
                    $_POSTAG['LandpeatAG']['bobot_thick']   = $bobot_thick_ag;
                    $_POSTAG['LandpeatAG']['bobot_ripe']     = $bobot_ripe_ag;
                    $_POSTAG['LandpeatAG']['cr']           = $consistensi_rasio_ag;

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
     * Updates an existing Landpeat model.
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
     * Deletes an existing Landpeat model.
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
     * Finds the Landpeat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Landpeat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Landpeat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
