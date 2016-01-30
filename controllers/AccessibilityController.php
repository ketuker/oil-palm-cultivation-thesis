<?php

namespace app\controllers;

use Yii;
use app\models\Accessibility;
use app\models\AccessibilitySearch;
use app\models\AccessibilityAG;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AccessibilityController implements the CRUD actions for Accessibility model.
 */
class AccessibilityController extends Controller
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
     * Lists all Accessibility models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AccessibilitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Accessibility model.
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
     * Creates a new Accessibility model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Accessibility();

        if (Yii::$app->request->post()) {

            $road_mills    = $_POST['Accessibility']['road_mills'];
            $mills_road    = 1 / $road_mills;
            $road_road      = 1;


            $mills_town    = $_POST['Accessibility']['mills_town'];
            $town_mills    = 1 / $mills_town;
            $mills_mills  = 1;

            $road_town      = $_POST['Accessibility']['road_town'];
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

            if (Yii::$app->user->getId()) {
                $_POST['Accessibility']['road_mills']    = $road_mills;
                $_POST['Accessibility']['road_town']      = $road_town;
                $_POST['Accessibility']['mills_town']    = $mills_town;
                $_POST['Accessibility']['bobot_road']   = $bobot_road;
                $_POST['Accessibility']['bobot_mills'] = $bobot_mills;
                $_POST['Accessibility']['bobot_town']   = $bobot_town;
                $_POST['Accessibility']['cr']         = $consistensi_rasio;
                $_POST['Accessibility']['validation'] = $validation;
                $_POST['Accessibility']['id_user']    = Yii::$app->user->getId();

                if ($model->load($_POST) && $model->save()) {

                    $data_access                      = Accessibility::find()->where(['validation'=> TRUE])->AsArray()->All();

                    $road_mills_ag_base                    = [];
                    $road_town_ag_base                      = [];
                    $mills_town_ag_base                    = [];
                    $bobot_road_ag_base                   = [];
                    $bobot_mills_ag_base                 = [];
                    $bobot_town_ag_base                   = [];
                    $consistensi_rasio_ag_base          = [];

                    for ($i=0; $i < count($data_access); $i++) { 
                        $road_mills_ag_base[$i]            = $data_access[$i]['road_mills'];
                        $road_town_ag_base[$i]              = $data_access[$i]['road_town'];
                        $mills_town_ag_base[$i]            = $data_access[$i]['mills_town'];
                        $bobot_road_ag_base[$i]           = $data_access[$i]['bobot_road'];
                        $bobot_mills_ag_base[$i]         = $data_access[$i]['bobot_mills'];
                        $bobot_town_ag_base[$i]           = $data_access[$i]['bobot_town'];
                        $consistensi_rasio_ag_base[$i]  = $data_access[$i]['cr'];
                    }

                    $road_mills_ag                         = sqrt (array_product($road_mills_ag_base));
                    $road_town_ag                           = sqrt (array_product($road_town_ag_base));
                    $mills_town_ag                         = sqrt (array_product($mills_town_ag_base));
                    $bobot_road_ag                        = sqrt (array_product($bobot_road_ag_base));
                    $bobot_mills_ag                      = sqrt (array_product($bobot_mills_ag_base));
                    $bobot_town_ag                        = sqrt (array_product($bobot_town_ag_base));
                    $consistensi_rasio_ag               = sqrt (array_product($consistensi_rasio_ag_base));

                    $model_ag                           = new AccessibilityAG();

                    $_POSTAG['AccessibilityAG']['road_mills']      = $road_mills_ag;
                    $_POSTAG['AccessibilityAG']['road_town']        = $road_town_ag;
                    $_POSTAG['AccessibilityAG']['mills_town']      = $mills_town_ag;
                    $_POSTAG['AccessibilityAG']['bobot_road']     = $bobot_road_ag;
                    $_POSTAG['AccessibilityAG']['bobot_mills']   = $bobot_mills_ag;
                    $_POSTAG['AccessibilityAG']['bobot_town']     = $bobot_town_ag;
                    $_POSTAG['AccessibilityAG']['cr']           = $consistensi_rasio_ag;

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
     * Updates an existing Accessibility model.
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
     * Deletes an existing Accessibility model.
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
     * Finds the Accessibility model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Accessibility the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Accessibility::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
