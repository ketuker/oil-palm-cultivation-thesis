<?php

namespace app\controllers;

use Yii;
use app\models\Landnpeat;
use app\models\LandnpeatSearch;
use app\models\LandnpeatAG;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LandnpeatController implements the CRUD actions for Landnpeat model.
 */
class LandnpeatController extends Controller
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
     * Lists all Landnpeat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LandnpeatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Landnpeat model.
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

            return json_encode(['cr' => $consistensi_rasio, 'validation' => $validation]);
            
        }
    }
    /**
     * Creates a new Landnpeat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Landnpeat();

        if (Yii::$app->request->post()) {

            $slope_text    = $_POST['Landnpeat']['slope_text'];
            $text_slope    = 1 / $slope_text;
            $slope_slope      = 1;


            $text_elev    = $_POST['Landnpeat']['text_elev'];
            $elev_text    = 1 / $text_elev;
            $text_text  = 1;

            $slope_elev      = $_POST['Landnpeat']['slope_elev'];
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


            if (Yii::$app->user->getId()) {
                $_POST['Landnpeat']['slope_text']   = $slope_text;
                $_POST['Landnpeat']['slope_elev']   = $slope_elev;
                $_POST['Landnpeat']['text_elev']    = $text_elev;
                $_POST['Landnpeat']['bobot_slope']  = $bobot_slope;
                $_POST['Landnpeat']['bobot_text']   = $bobot_text;
                $_POST['Landnpeat']['bobot_elev']   = $bobot_elev;
                $_POST['Landnpeat']['cr']           = $consistensi_rasio;
                $_POST['Landnpeat']['validation']   = $validation;
                $_POST['Landnpeat']['id_user']      = Yii::$app->user->getId();

                if ($model->load($_POST) && $model->save()) {

                    $data_text_texts                    = Landnpeat::find()->where(['validation'=> TRUE])->AsArray()->All();

                    $slope_text_ag_base                 = [];
                    $slope_elev_ag_base                 = [];
                    $text_elev_ag_base                  = [];
                    $bobot_slope_ag_base                = [];
                    $bobot_text_ag_base                 = [];
                    $bobot_elev_ag_base                 = [];
                    $consistensi_rasio_ag_base          = [];

                    for ($i=0; $i < count($data_text_texts); $i++) { 
                        $slope_text_ag_base[$i]         = $data_text_texts[$i]['slope_text'];
                        $slope_elev_ag_base[$i]         = $data_text_texts[$i]['slope_elev'];
                        $text_elev_ag_base[$i]          = $data_text_texts[$i]['text_elev'];
                        // $bobot_slope_ag_base[$i]        = $data_text_texts[$i]['bobot_slope'];
                        // $bobot_text_ag_base[$i]         = $data_text_texts[$i]['bobot_text'];
                        // $bobot_elev_ag_base[$i]         = $data_text_texts[$i]['bobot_elev'];
                        // $consistensi_rasio_ag_base[$i]  = $data_text_texts[$i]['cr'];
                    }

                    $slope_text_ag                          = pow (array_product($slope_text_ag_base),1/count($data_text_texts));
                    $text_slope_ag                          = 1/$slope_text_ag;
                    $slope_slope_ag                         = 1;


                    $slope_elev_ag                          = pow (array_product($slope_elev_ag_base),1/count($data_text_texts));
                    $elev_slope_ag                          = 1/$slope_elev_ag;
                    $elev_elev_ag                           = 1;                    


                    $text_elev_ag                           = pow (array_product($text_elev_ag_base),1/count($data_text_texts));
                    $elev_text_ag                           = 1/$text_elev_ag;
                    $text_text_ag                           = 1;

                    // $bobot_slope_ag                     = sqrt (array_product($bobot_slope_ag_base));
                    // $bobot_text_ag                      = sqrt (array_product($bobot_text_ag_base));
                    // $bobot_elev_ag                      = sqrt (array_product($bobot_elev_ag_base));
                    // $consistensi_rasio_ag               = sqrt (array_product($consistensi_rasio_ag_base));


                    $sum_column_slope_ag      = $slope_slope_ag + $text_slope_ag + $elev_slope_ag;
                    $sum_column_text_ag    = $slope_text_ag + $text_text_ag + $elev_text_ag;
                    $sum_column_elev_ag      = $slope_elev_ag + $text_elev_ag + $elev_elev_ag;


                    /* ---- */
                    $divided_sum_sum_ag        = $sum_column_slope_ag / $sum_column_slope_ag;

                    $divided_slope_slope_ag_sum      = $slope_slope_ag / $sum_column_slope_ag;
                    $divided_slope_text_ag_sum    = $text_slope_ag / $sum_column_slope_ag;
                    $divided_slope_elev_ag_sum      = $elev_slope_ag / $sum_column_slope_ag;

                    $divided_text_slope_ag_sum    = $slope_text_ag / $sum_column_text_ag;
                    $divided_text_text_ag_sum  = $text_text_ag / $sum_column_text_ag;
                    $divided_text_elev_ag_sum    = $elev_text_ag / $sum_column_text_ag;

                    $divided_elev_slope_ag_sum      = $slope_elev_ag / $sum_column_elev_ag;
                    $divided_elev_text_ag_sum    = $text_elev_ag / $sum_column_elev_ag;
                    $divided_elev_elev_ag_sum      = $elev_elev_ag / $sum_column_elev_ag;
                    /* ---- */

                    $sum_slope_ag             = $divided_slope_slope_ag_sum + $divided_text_slope_ag_sum + $divided_elev_slope_ag_sum;
                    $sum_text_ag           = $divided_slope_text_ag_sum + $divided_text_text_ag_sum + $divided_elev_text_ag_sum;
                    $sum_elev_ag             = $divided_slope_elev_ag_sum + $divided_text_elev_ag_sum + $divided_elev_elev_ag_sum;
                    $sum_divided_ag        = $divided_sum_sum_ag + $divided_sum_sum_ag + $divided_sum_sum_ag;

                    /* ---- */
                    $bobot_slope_ag           = $sum_slope_ag / $sum_divided_ag;
                    $bobot_text_ag         = $sum_text_ag / $sum_divided_ag;
                    $bobot_elev_ag           = $sum_elev_ag / $sum_divided_ag;
                    /* ---- */

                    /* ---- */
                    $multiple_slope_slope_ag_bobot      = $slope_slope_ag * $bobot_slope_ag;
                    $multiple_slope_text_ag_bobot    = $text_slope_ag * $bobot_slope_ag;
                    $multiple_slope_elev_ag_bobot      = $elev_slope_ag * $bobot_slope_ag;

                    $multiple_text_slope_ag_bobot    = $slope_text_ag * $bobot_text_ag;
                    $multiple_text_text_ag_bobot  = $text_text_ag * $bobot_text_ag;
                    $multiple_text_elev_ag_bobot    = $elev_text_ag * $bobot_text_ag;

                    $multiple_elev_slope_ag_bobot      = $slope_elev_ag * $bobot_elev_ag;
                    $multiple_elev_text_ag_bobot    = $text_elev_ag * $bobot_elev_ag;
                    $multiple_elev_elev_ag_bobot      = $elev_elev_ag * $bobot_elev_ag;
                    /* ---- */

                    /* ---- */
                    $sum_bobot_slope_ag               = $multiple_slope_slope_ag_bobot + $multiple_text_slope_ag_bobot + $multiple_elev_slope_ag_bobot;
                    $sum_bobot_text_ag             = $multiple_slope_text_ag_bobot + $multiple_text_text_ag_bobot + $multiple_elev_text_ag_bobot;
                    $sum_bobot_elev_ag               = $multiple_slope_elev_ag_bobot + $multiple_text_elev_ag_bobot + $multiple_elev_elev_ag_bobot;
                    /* ---- */

                    $divided_bobot_slope_ag           = $sum_bobot_slope_ag / $bobot_slope_ag;
                    $divided_bobot_text_ag         = $sum_bobot_text_ag / $bobot_text_ag;
                    $divided_bobot_elev_ag           = $sum_bobot_elev_ag / $bobot_elev_ag;

                    /* ---- */
                    $lamda_max_ag                  = ($divided_bobot_slope_ag + $divided_bobot_text_ag + $divided_bobot_elev_ag) / $sum_divided_ag;
                    $jumlah_factor_ag              = $sum_divided_ag;
                    $consistensi_index_ag          = ($lamda_max_ag-$jumlah_factor_ag)/($jumlah_factor_ag-1);
                    $rasio_index_ag                = 0.58;
                    $consistensi_rasio_ag          = $consistensi_index_ag / $rasio_index_ag;
                    /* ---- */

                    $model_ag                           = new LandnpeatAG();



                    $_POSTAG['LandnpeatAG']['slope_text']   = $slope_text_ag;
                    $_POSTAG['LandnpeatAG']['slope_elev']   = $slope_elev_ag;
                    $_POSTAG['LandnpeatAG']['text_elev']    = $text_elev_ag;
                    $_POSTAG['LandnpeatAG']['bobot_slope']  = $bobot_slope_ag;
                    $_POSTAG['LandnpeatAG']['bobot_text']   = $bobot_text_ag;
                    $_POSTAG['LandnpeatAG']['bobot_elev']   = $bobot_elev_ag;
                    $_POSTAG['LandnpeatAG']['cr']           = $consistensi_rasio_ag;

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
     * Updates an existing Landnpeat model.
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
     * Deletes an existing Landnpeat model.
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
     * Finds the Landnpeat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Landnpeat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Landnpeat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
