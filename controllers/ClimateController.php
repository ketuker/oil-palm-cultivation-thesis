<?php

namespace app\controllers;

use Yii;
use app\models\Climate;
use app\models\ClimateSearch;
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
            // echo "Sum CH = " . $sum_column_ch ."</br>";
            $sum_column_temp    = $ch_temp + $temp_temp + $dm_temp;
            // echo "Sum temp = " . $sum_column_temp."</br>";
            $sum_column_dm      = $ch_dm + $temp_dm + $dm_dm;
            // echo "Sum dm = " . $sum_column_dm."</br>";

            /* ---- */

            $divided_sum_sum        = $sum_column_ch / $sum_column_ch;

            $divided_ch_ch_sum      = $ch_ch / $sum_column_ch;
            // echo $divided_ch_ch_sum."</br>";
            $divided_ch_temp_sum    = $temp_ch / $sum_column_ch;
            // echo $divided_ch_temp_sum."</br>";
            $divided_ch_dm_sum      = $dm_ch / $sum_column_ch;
            // echo $divided_ch_dm_sum."</br>";

            $divided_temp_ch_sum    = $ch_temp / $sum_column_temp;
            // echo $divided_temp_ch_sum."</br>";
            $divided_temp_temp_sum  = $temp_temp / $sum_column_temp;
            // echo $divided_temp_temp_sum."</br>";
            $divided_temp_dm_sum    = $dm_temp / $sum_column_temp;
            // echo $divided_temp_dm_sum."</br>";

            $divided_dm_ch_sum      = $ch_dm / $sum_column_dm;
            // echo $divided_dm_ch_sum."</br>";
            $divided_dm_temp_sum    = $temp_dm / $sum_column_dm;
            // echo $divided_dm_temp_sum."</br>";
            $divided_dm_dm_sum      = $dm_dm / $sum_column_dm;
            // echo $divided_dm_dm_sum."</br>";

            /* ---- */

            $sum_ch             = $divided_ch_ch_sum + $divided_temp_ch_sum + $divided_dm_ch_sum;
            // echo $sum_ch."</br>";
            $sum_temp           = $divided_ch_temp_sum + $divided_temp_temp_sum + $divided_dm_temp_sum;
            // echo $sum_temp."</br>";
            $sum_dm             = $divided_ch_dm_sum + $divided_temp_dm_sum + $divided_dm_dm_sum;
            // echo $sum_dm."</br>";
            $sum_divided        = $divided_sum_sum + $divided_sum_sum + $divided_sum_sum;
            // echo $sum_divided."</br>";

            /* ---- */

            $bobot_ch           = $sum_ch / $sum_divided;
            // echo $bobot_ch."</br>";
            $bobot_temp         = $sum_temp / $sum_divided;
            // echo $bobot_temp."</br>";
            $bobot_dm           = $sum_dm / $sum_divided;
            // echo $bobot_dm."</br>";

            /* ---- */

            $multiple_ch_ch_bobot      = $ch_ch * $bobot_ch;
            // echo $multiple_ch_ch_bobot."</br>";
            $multiple_ch_temp_bobot    = $temp_ch * $bobot_ch;
            // echo $multiple_ch_temp_bobot."</br>";
            $multiple_ch_dm_bobot      = $dm_ch * $bobot_ch;
            // echo $multiple_ch_dm_bobot."</br>";

            $multiple_temp_ch_bobot    = $ch_temp * $bobot_temp;
            // echo $multiple_temp_ch_bobot."</br>";
            $multiple_temp_temp_bobot  = $temp_temp * $bobot_temp;
            // echo $multiple_temp_temp_bobot."</br>";
            $multiple_temp_dm_bobot    = $dm_temp * $bobot_temp;
            // echo $multiple_temp_dm_bobot."</br>";

            $multiple_dm_ch_bobot      = $ch_dm * $bobot_dm;
            // echo $ch_dm.$multiple_dm_ch_bobot."</br>";
            $multiple_dm_temp_bobot    = $temp_dm * $bobot_dm;
            // echo $multiple_dm_temp_bobot."</br>";
            $multiple_dm_dm_bobot      = $dm_dm * $bobot_dm;
            // echo $multiple_dm_dm_bobot."</br>";

            /* ---- */

            $sum_bobot_ch               = $multiple_ch_ch_bobot + $multiple_temp_ch_bobot + $multiple_dm_ch_bobot;
            // echo $sum_bobot_ch."</br>";
            $sum_bobot_temp             = $multiple_ch_temp_bobot + $multiple_temp_temp_bobot + $multiple_dm_temp_bobot;
            // echo $sum_bobot_temp."</br>";
            $sum_bobot_dm               = $multiple_ch_dm_bobot + $multiple_temp_dm_bobot + $multiple_dm_dm_bobot;
            // echo $sum_bobot_dm."</br>";

            /* ---- */

            $divided_bobot_ch           = $sum_bobot_ch / $bobot_ch;
            // echo $divided_bobot_ch."</br>";
            $divided_bobot_temp         = $sum_bobot_temp / $bobot_temp;
            // echo $divided_bobot_temp."</br>";
            $divided_bobot_dm           = $sum_bobot_dm / $bobot_dm;
            // echo $divided_bobot_dm."</br>";

            /* ---- */
            $lamda_max                  = ($divided_bobot_ch + $divided_bobot_temp + $divided_bobot_dm) / $sum_divided;
            $jumlah_factor              = $sum_divided;
            $consistensi_index          = ($lamda_max-$jumlah_factor)/($jumlah_factor-1);
            $rasio_index                = 0.58;
            $consistensi_rasio          = $consistensi_index / $rasio_index;

            echo "Consistensi Rasio = " . $consistensi_rasio;
            die();

            //$model->load(Yii::$app->request->post()) && $model->save()

            return $this->redirect(['view', 'id' => $model->id]);
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
