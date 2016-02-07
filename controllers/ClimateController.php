<?php

namespace app\controllers;

use Yii;
use app\models\Climate;
use app\models\ClimateSearch;
use app\models\ClimateAG;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClimateController implements the CRUD actions for Climate model.
 */
class ClimateController extends Controller
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
     * Lists all Climate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClimateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Climate model.
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

            return json_encode(['cr' => $consistensi_rasio, 'validation' => $validation]);
            
        }
    }

    /**
     * Creates a new Climate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Climate();

        if (Yii::$app->request->post()) {

            $ch_temp    = $_POST['Climate']['ch_temp'];
            $temp_ch    = 1 / $ch_temp;
            $ch_ch      = 1;


            $temp_dm    = $_POST['Climate']['temp_dm'];
            $dm_temp    = 1 / $temp_dm;
            $temp_temp  = 1;

            $ch_dm      = $_POST['Climate']['ch_dm'];
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

            if (Yii::$app->user->getId()) {
                $_POST['Climate']['ch_temp']    = $ch_temp;
                $_POST['Climate']['ch_dm']      = $ch_dm;
                $_POST['Climate']['temp_dm']    = $temp_dm;
                $_POST['Climate']['bobot_ch']   = $bobot_ch;
                $_POST['Climate']['boobt_temp'] = $bobot_temp;
                $_POST['Climate']['bobot_dm']   = $bobot_dm;
                $_POST['Climate']['cr']         = $consistensi_rasio;
                $_POST['Climate']['validation'] = $validation;
                $_POST['Climate']['id_user']    = Yii::$app->user->getId();

                if ($model->load($_POST) && $model->save()) {

                    $data_climates                      = Climate::find()->where(['validation'=> TRUE])->AsArray()->All();

                    $ch_temp_ag_base                    = [];
                    $ch_dm_ag_base                      = [];
                    $temp_dm_ag_base                    = [];
                    $bobot_ch_ag_base                   = [];
                    $bobot_temp_ag_base                 = [];
                    $bobot_dm_ag_base                   = [];
                    $consistensi_rasio_ag_base          = [];

                    for ($i=0; $i < count($data_climates); $i++) { 
                        $ch_temp_ag_base[$i]            = $data_climates[$i]['ch_temp'];
                        $ch_dm_ag_base[$i]              = $data_climates[$i]['ch_dm'];
                        $temp_dm_ag_base[$i]            = $data_climates[$i]['temp_dm'];
                        $bobot_ch_ag_base[$i]           = $data_climates[$i]['bobot_ch'];
                        $bobot_temp_ag_base[$i]         = $data_climates[$i]['boobt_temp'];
                        $bobot_dm_ag_base[$i]           = $data_climates[$i]['bobot_dm'];
                        $consistensi_rasio_ag_base[$i]  = $data_climates[$i]['cr'];
                    }

                    $ch_temp_ag                         = sqrt (array_product($ch_temp_ag_base));
                    $ch_dm_ag                           = sqrt (array_product($ch_dm_ag_base));
                    $temp_dm_ag                         = sqrt (array_product($temp_dm_ag_base));
                    $bobot_ch_ag                        = sqrt (array_product($bobot_ch_ag_base));
                    $bobot_temp_ag                      = sqrt (array_product($bobot_temp_ag_base));
                    $bobot_dm_ag                        = sqrt (array_product($bobot_dm_ag_base));
                    $consistensi_rasio_ag               = sqrt (array_product($consistensi_rasio_ag_base));

                    $model_ag                           = new ClimateAG();

                    $_POSTAG['ClimateAG']['ch_temp']      = $ch_temp_ag;
                    $_POSTAG['ClimateAG']['ch_dm']        = $ch_dm_ag;
                    $_POSTAG['ClimateAG']['temp_dm']      = $temp_dm_ag;
                    $_POSTAG['ClimateAG']['bobot_ch']     = $bobot_ch_ag;
                    $_POSTAG['ClimateAG']['boobt_temp']   = $bobot_temp_ag;
                    $_POSTAG['ClimateAG']['bobot_dm']     = $bobot_dm_ag;
                    $_POSTAG['ClimateAG']['cr']           = $consistensi_rasio_ag;

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
     * Updates an existing Climate model.
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
     * Deletes an existing Climate model.
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
     * Finds the Climate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Climate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Climate::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
