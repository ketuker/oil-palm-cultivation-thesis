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
            // 0.14285714285714285
            $temp_ch    = 1 / $ch_temp;
            $ch_ch      = 1;

            $temp_dm    = $_POST['Climate']['temp_dm'];
            // 3
            echo "<br>";
            $dm_temp    = 1 / $temp_dm;
            $temp_temp  = 1;

            $ch_dm      = $_POST['Climate']['ch_dm'];
            // 0.3333333333333333
            echo "<br>";
            $dm_ch      = 1 / $ch_dm;
            $dm_dm      = 1;

            $sum_column_ch      = $ch_ch + $temp_ch + $dm_ch;
            $sum_column_temp    = $ch_temp + $temp_temp + $dm_temp;
            $sum_column_dm      = $ch_dm + $temp_dm + $dm_dm;

            echo $sum_column_ch . " - " . $sum_column_temp . " - " . $sum_column_dm;
            echo "<br>";

            /* ---- */

            $divided_sum_sum        = $sum_column_ch / $sum_column_ch;

            $divided_ch_ch_sum      = $ch_ch / $sum_column_ch;
            $divided_ch_temp_sum    = $ch_temp / $sum_column_temp;
            $divided_ch_dm_sum      = $ch_dm / $sum_column_dm;

            $divided_temp_ch_sum    = $temp_ch / $sum_column_ch;
            $divided_temp_temp_sum  = $temp_temp / $sum_column_temp;
            $divided_temp_dm_sum    = $temp_dm / $sum_column_dm;

            $divided_dm_ch_sum      = $dm_ch / $sum_column_ch;
            $divided_dm_temp_sum    = $dm_temp / $sum_column_temp;
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

            $multiple_ch_ch_bobot      = $ch_ch / $bobot_ch;
            $multiple_ch_temp_bobot    = $ch_temp / $bobot_ch;
            $multiple_ch_dm_bobot      = $ch_dm / $bobot_ch;

            $multiple_temp_ch_bobot    = $temp_ch / $bobot_temp;
            $multiple_temp_temp_bobot  = $temp_temp / $bobot_temp;
            $multiple_temp_dm_bobot    = $temp_dm / $bobot_temp;

            $multiple_dm_ch_bobot      = $dm_ch / $bobot_dm;
            $multiple_dm_temp_bobot    = $dm_temp / $bobot_dm;
            $multiple_dm_dm_bobot      = $dm_dm / $bobot_dm;

            /* ---- */

            $sum_bobot_ch               = $multiple_ch_ch_bobot + $multiple_ch_temp_bobot + $multiple_ch_dm_bobot;
            $sum_bobot_temp             = $multiple_temp_ch_bobot + $multiple_temp_temp_bobot + $multiple_temp_dm_bobot;
            $sum_bobot_dm               = $multiple_dm_ch_bobot + $multiple_dm_temp_bobot + $multiple_dm_dm_bobot;

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

            echo "Bobot CH : " . $bobot_ch . "<br>Bobot Temp : " . $bobot_temp .  "<br>Bobot DM : " . $bobot_dm;
            echo "<br>Total : " . ($bobot_ch + $bobot_temp + $bobot_dm);
            echo "<br>Consistensi Rasio = " . $consistensi_rasio;
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
