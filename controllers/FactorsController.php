<?php

namespace app\controllers;

use Yii;
use app\models\Factors;
use app\models\FactorsSearch;
use app\models\FactorsAG;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FactorsController implements the CRUD actions for Factors model.
 */
class FactorsController extends Controller
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
     * Lists all Factors models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FactorsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Factors model.
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

            return json_encode(['cr' => $consistensi_rasio, 'validation' => $validation]);
            
        }
    }

    /**
     * Creates a new Factors model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Factors();

        if (Yii::$app->request->post()) {

            $climate_land    = $_POST['Factors']['climate_land'];
            $land_climate    = 1 / $climate_land;
            $climate_climate      = 1;


            $land_accessibility    = $_POST['Factors']['land_accessibility'];
            $accessibility_land    = 1 / $land_accessibility;
            $land_land  = 1;

            $climate_accessibility      = $_POST['Factors']['climate_accessibility'];
            $accessibility_climate      = 1 / $climate_accessibility;
            $accessibility_accessibility      = 1;

            $sum_column_climate      = $climate_climate + $land_climate + $accessibility_climate;
            $sum_column_land    = $climate_land + $land_land + $accessibility_land;
            $sum_column_accessibility      = $climate_accessibility + $land_accessibility + $accessibility_accessibility;


            /* ---- */
            $divided_sum_sum        = $sum_column_climate / $sum_column_climate;

            $divided_climate_climate_sum      = $climate_climate / $sum_column_climate;
            $divided_climate_land_sum    = $land_climate / $sum_column_climate;
            $divided_climate_accessibility_sum      = $accessibility_climate / $sum_column_climate;

            $divided_land_climate_sum    = $climate_land / $sum_column_land;
            $divided_land_land_sum  = $land_land / $sum_column_land;
            $divided_land_accessibility_sum    = $accessibility_land / $sum_column_land;

            $divided_accessibility_climate_sum      = $climate_accessibility / $sum_column_accessibility;
            $divided_accessibility_land_sum    = $land_accessibility / $sum_column_accessibility;
            $divided_accessibility_accessibility_sum      = $accessibility_accessibility / $sum_column_accessibility;
            /* ---- */

            $sum_climate             = $divided_climate_climate_sum + $divided_land_climate_sum + $divided_accessibility_climate_sum;
            $sum_land           = $divided_climate_land_sum + $divided_land_land_sum + $divided_accessibility_land_sum;
            $sum_accessibility             = $divided_climate_accessibility_sum + $divided_land_accessibility_sum + $divided_accessibility_accessibility_sum;
            $sum_divided        = $divided_sum_sum + $divided_sum_sum + $divided_sum_sum;

            /* ---- */
            $bobot_climate           = $sum_climate / $sum_divided;
            $bobot_land         = $sum_land / $sum_divided;
            $bobot_accessibility           = $sum_accessibility / $sum_divided;
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

            $divided_bobot_climate           = $sum_bobot_climate / $bobot_climate;
            $divided_bobot_land         = $sum_bobot_land / $bobot_land;
            $divided_bobot_accessibility           = $sum_bobot_accessibility / $bobot_accessibility;

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

            if (Yii::$app->user->getId()) {
                $_POST['Factors']['climate_land']    = $climate_land;
                $_POST['Factors']['climate_accessibility']      = $climate_accessibility;
                $_POST['Factors']['land_accessibility']    = $land_accessibility;
                $_POST['Factors']['bobot_climate']   = $bobot_climate;
                $_POST['Factors']['bobot_land'] = $bobot_land;
                $_POST['Factors']['bobot_accessibility']   = $bobot_accessibility;
                $_POST['Factors']['cr']         = $consistensi_rasio;
                $_POST['Factors']['validation'] = $validation;
                $_POST['Factors']['id_user']    = Yii::$app->user->getId();

                if ($model->load($_POST) && $model->save()) {

                    $data_factors                      = Factors::find()->where(['validation'=> TRUE])->AsArray()->All();

                    $climate_land_ag_base                    = [];
                    $climate_accessibility_ag_base                      = [];
                    $land_accessibility_ag_base                    = [];
                    $bobot_climate_ag_base                   = [];
                    $bobot_land_ag_base                 = [];
                    $bobot_accessibility_ag_base                   = [];
                    $consistensi_rasio_ag_base          = [];

                    for ($i=0; $i < count($data_factors); $i++) { 
                        $climate_land_ag_base[$i]            = $data_factors[$i]['climate_land'];
                        $climate_accessibility_ag_base[$i]   = $data_factors[$i]['climate_accessibility'];
                        $land_accessibility_ag_base[$i]      = $data_factors[$i]['land_accessibility'];
                        // $bobot_climate_ag_base[$i]           = $data_factors[$i]['bobot_climate'];
                        // $bobot_land_ag_base[$i]              = $data_factors[$i]['bobot_land'];
                        // $bobot_accessibility_ag_base[$i]     = $data_factors[$i]['bobot_accessibility'];
                        // $consistensi_rasio_ag_base[$i]       = $data_factors[$i]['cr'];
                    }

                    $climate_land_ag                         = pow (array_product($climate_land_ag_base),1/count($data_factors));
                    $land_climate_ag                         = 1 / $climate_land_ag;
                    $climate_climate_ag                      = 1;

                    $climate_accessibility_ag                = pow (array_product($climate_accessibility_ag_base),1/count($data_factors));
                    $accessibility_climate_ag                = 1 / $climate_accessibility_ag ;
                    $land_land_ag                            = 1;

                    $land_accessibility_ag                   = pow (array_product($land_accessibility_ag_base),1/count($data_factors));
                    $accessibility_land_ag                   = 1 / $land_accessibility_ag ;
                    $accessibility_accessibility_ag          = 1;

                    // $bobot_climate_ag                        = sqrt (array_product($bobot_climate_ag_base));
                    // $bobot_land_ag                           = sqrt (array_product($bobot_land_ag_base));
                    // $bobot_accessibility_ag                  = sqrt (array_product($bobot_accessibility_ag_base));
                    // $consistensi_rasio_ag                    = sqrt (array_product($consistensi_rasio_ag_base));

                    $sum_column_climate_ag           = $climate_climate_ag + $land_climate_ag + $accessibility_climate_ag;
                    $sum_column_land_ag              = $climate_land_ag + $land_land_ag + $accessibility_land_ag;
                    $sum_column_accessibility_ag     = $climate_accessibility_ag + $land_accessibility_ag + $accessibility_accessibility_ag;


                    /* ---- */
                    $divided_sum_sum_ag              = $sum_column_climate_ag / $sum_column_climate_ag;

                    $divided_climate_climate_ag_sum        = $climate_climate_ag / $sum_column_climate_ag;
                    $divided_climate_land_ag_sum           = $land_climate_ag / $sum_column_climate_ag;
                    $divided_climate_accessibility_ag_sum  = $accessibility_climate_ag / $sum_column_climate_ag;

                    $divided_land_climate_ag_sum           = $climate_land_ag / $sum_column_land_ag;
                    $divided_land_land_ag_sum              = $land_land_ag / $sum_column_land_ag;
                    $divided_land_accessibility_ag_sum     = $accessibility_land_ag / $sum_column_land_ag;

                    $divided_accessibility_climate_ag_sum        = $climate_accessibility_ag / $sum_column_accessibility_ag;
                    $divided_accessibility_land_ag_sum           = $land_accessibility_ag / $sum_column_accessibility_ag;
                    $divided_accessibility_accessibility_ag_sum  = $accessibility_accessibility_ag / $sum_column_accessibility_ag;
                    /* ---- */

                    $sum_climate_ag        = $divided_climate_climate_ag_sum + $divided_land_climate_ag_sum + $divided_accessibility_climate_ag_sum;
                    $sum_land_ag           = $divided_climate_land_ag_sum + $divided_land_land_ag_sum + $divided_accessibility_land_ag_sum;
                    $sum_accessibility_ag  = $divided_climate_accessibility_ag_sum + $divided_land_accessibility_ag_sum + $divided_accessibility_accessibility_ag_sum;
                    $sum_divided_ag        = $divided_sum_sum_ag + $divided_sum_sum_ag + $divided_sum_sum_ag;

                    /* ---- */
                    $bobot_climate_ag          = $sum_climate_ag / $sum_divided_ag;
                    $bobot_land_ag             = $sum_land_ag / $sum_divided_ag;
                    $bobot_accessibility_ag    = $sum_accessibility_ag / $sum_divided_ag;
                    /* ---- */

                    /* ---- */
                    $multiple_climate_climate_ag_bobot           = $climate_climate_ag * $bobot_climate_ag;
                    $multiple_climate_land_ag_bobot              = $land_climate_ag * $bobot_climate_ag;
                    $multiple_climate_accessibility_ag_bobot     = $accessibility_climate_ag * $bobot_climate_ag;

                    $multiple_land_climate_ag_bobot        = $climate_land_ag * $bobot_land_ag;
                    $multiple_land_land_ag_bobot           = $land_land_ag * $bobot_land_ag;
                    $multiple_land_accessibility_ag_bobot  = $accessibility_land_ag * $bobot_land_ag;

                    $multiple_accessibility_climate_ag_bobot           = $climate_accessibility_ag * $bobot_accessibility_ag;
                    $multiple_accessibility_land_ag_bobot              = $land_accessibility_ag * $bobot_accessibility_ag;
                    $multiple_accessibility_accessibility_ag_bobot     = $accessibility_accessibility_ag * $bobot_accessibility_ag;
                    /* ---- */

                    /* ---- */
                    $sum_bobot_climate_ag          = $multiple_climate_climate_ag_bobot + $multiple_land_climate_ag_bobot + $multiple_accessibility_climate_ag_bobot;
                    $sum_bobot_land_ag             = $multiple_climate_land_ag_bobot + $multiple_land_land_ag_bobot + $multiple_accessibility_land_ag_bobot;
                    $sum_bobot_accessibility_ag    = $multiple_climate_accessibility_ag_bobot + $multiple_land_accessibility_ag_bobot + $multiple_accessibility_accessibility_ag_bobot;
                    /* ---- */

                    $divided_bobot_climate_ag        = $sum_bobot_climate_ag / $bobot_climate_ag;
                    $divided_bobot_land_ag           = $sum_bobot_land_ag / $bobot_land_ag;
                    $divided_bobot_accessibility_ag  = $sum_bobot_accessibility_ag / $bobot_accessibility_ag;

                    /* ---- */
                    $lamda_max_ag                  = ($divided_bobot_climate_ag + $divided_bobot_land_ag + $divided_bobot_accessibility_ag) / $sum_divided_ag;
                    $jumlah_factor_ag              = $sum_divided_ag;
                    $consistensi_index_ag          = ($lamda_max_ag-$jumlah_factor_ag)/($jumlah_factor_ag-1);
                    $rasio_index_ag                = 0.58;
                    $consistensi_rasio_ag          = $consistensi_index_ag / $rasio_index_ag;
                    /* ---- */


                    $model_ag                                = new FactorsAG();

                    $_POSTAG['FactorsAG']['climate_land']           = $climate_land_ag;
                    $_POSTAG['FactorsAG']['climate_accessibility']  = $climate_accessibility_ag;
                    $_POSTAG['FactorsAG']['land_accessibility']     = $land_accessibility_ag;
                    $_POSTAG['FactorsAG']['bobot_climate']          = $bobot_climate_ag;
                    $_POSTAG['FactorsAG']['bobot_land']             = $bobot_land_ag;
                    $_POSTAG['FactorsAG']['bobot_accessibility']    = $bobot_accessibility_ag;
                    $_POSTAG['FactorsAG']['cr']                     = $consistensi_rasio_ag;

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
     * Updates an existing Factors model.
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
     * Deletes an existing Factors model.
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
     * Finds the Factors model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Factors the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Factors::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
