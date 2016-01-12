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

            $ch_compare_temp    = $_POST['Climate']['ch_temp'];
            $ch_compare_dm      = $_POST['Climate']['ch_dm'];
            $temp_compare_dm    = $_POST['Climate']['temp_dm'];

            /***
             * Decode from value widget to real value
             * Field ch_temp
             ***/
            if ($ch_compare_temp == 2) {
                // 1/9
                $ch_temp          = 1/9;
                $temp_ch          = 9;
            }
            if ($ch_compare_temp == 3) {
                // 1/8
                $ch_temp          = 1/8;
                $temp_ch          = 8;
            }
            if ($ch_compare_temp == 4) {
                // 1/7
                $ch_temp          = 1/7;
                $temp_ch          = 7;
            }
            if ($ch_compare_temp == 5) {
                // 1/6
                $ch_temp          = 1/6;
                $temp_ch          = 6;
            }
            if ($ch_compare_temp == 6) {
                // 1/5
                $ch_temp          = 1/5;
                $temp_ch          = 5;
            }
            if ($ch_compare_temp == 7) {
                // 1/4
                $ch_temp          = 1/4;
                $temp_ch          = 4;
            }
            if ($ch_compare_temp == 8) {
                // 1/3
                $ch_temp          = 1/3;
                $temp_ch          = 3;
            }
            if ($ch_compare_temp == 9) {
                // 1/2
                $ch_temp          = 1/2;
                $temp_ch          = 2;
            }
            if ($ch_compare_temp == 10) {
                // 1/1
                $ch_temp          = 1;
                $temp_ch          = 1;
            }
            if ($ch_compare_temp == 11) {
                // 2/1
                $ch_temp          = 2;
                $temp_ch          = 1/2;
            }
            if ($ch_compare_temp == 12) {
                // 3/1
                $ch_temp          = 3;
                $temp_ch          = 1/3;
            }
            if ($ch_compare_temp == 13) {
                // 4/1
                $ch_temp          = 4;
                $temp_ch          = 1/4;
            }
            if ($ch_compare_temp == 14) {
                // 5/1
                $ch_temp          = 5;
                $temp_ch          = 1/5;
            }
            if ($ch_compare_temp == 15) {
                // 6/1
                $ch_temp          = 6;
                $temp_ch          = 1/6;
            }
            if ($ch_compare_temp == 16) {
                // 7/1
                $ch_temp          = 7;
                $temp_ch          = 1/7;
            }
            if ($ch_compare_temp == 17) {
                // 8/1
                $ch_temp          = 8;
                $temp_ch          = 1/8;
            }
            if ($ch_compare_temp == 18) {
                // 9/1
                $ch_temp          = 9;
                $temp_ch          = 1/9;
            }

            /***
             * Decode from value widget to real value
             * Field ch_dm
             ***/
            if ($ch_compare_dm == 2) {
                // 1/9
                $ch_dm          = 1/9;
                $dm_ch          = 9;
            }
            if ($ch_compare_dm == 3) {
                // 1/8
                $ch_dm          = 1/8;
                $dm_ch          = 8;
            }
            if ($ch_compare_dm == 4) {
                // 1/7
                $ch_dm          = 1/7;
                $dm_ch          = 7;
            }
            if ($ch_compare_dm == 5) {
                // 1/6
                $ch_dm          = 1/6;
                $dm_ch          = 6;
            }
            if ($ch_compare_dm == 6) {
                // 1/5
                $ch_dm          = 1/5;
                $dm_ch          = 5;
            }
            if ($ch_compare_dm == 7) {
                // 1/4
                $ch_dm          = 1/4;
                $dm_ch          = 4;
            }
            if ($ch_compare_dm == 8) {
                // 1/3
                $ch_dm          = 1/3;
                $dm_ch          = 3;
            }
            if ($ch_compare_dm == 9) {
                // 1/2
                $ch_dm          = 1/2;
                $dm_ch          = 2;
            }
            if ($ch_compare_dm == 10) {
                // 1/1
                $ch_dm          = 1;
                $dm_ch          = 1;
            }
            if ($ch_compare_dm == 11) {
                // 2/1
                $ch_dm          = 2;
                $dm_ch          = 1/2;
            }
            if ($ch_compare_dm == 12) {
                // 3/1
                $ch_dm          = 3;
                $dm_ch          = 1/3;
            }
            if ($ch_compare_dm == 13) {
                // 4/1
                $ch_dm          = 4;
                $dm_ch          = 1/4;
            }
            if ($ch_compare_dm == 14) {
                // 5/1
                $ch_dm          = 5;
                $dm_ch          = 1/5;
            }
            if ($ch_compare_dm == 15) {
                // 6/1
                $ch_dm          = 6;
                $dm_ch          = 1/6;
            }
            if ($ch_compare_dm == 16) {
                // 7/1
                $ch_dm          = 7;
                $dm_ch          = 1/7;
            }
            if ($ch_compare_dm == 17) {
                // 8/1
                $ch_dm          = 8;
                $dm_ch          = 1/8;
            }
            if ($ch_compare_dm == 18) {
                // 9/1
                $ch_dm          = 9;
                $dm_ch          = 1/9;
            }

            /***
             * Decode from value widget to real value
             * Field temp_dm
             ***/
            if ($temp_compare_dm == 2) {
                // 1/9
                $temp_dm          = 1/9;
                $dm_temp          = 9;
            }
            if ($temp_compare_dm == 3) {
                // 1/8
                $temp_dm          = 1/8;
                $dm_temp          = 8;
            }
            if ($temp_compare_dm == 4) {
                // 1/7
                $temp_dm          = 1/7;
                $dm_temp          = 7;
            }
            if ($temp_compare_dm == 5) {
                // 1/6
                $temp_dm          = 1/6;
                $dm_temp          = 6;
            }
            if ($temp_compare_dm == 6) {
                // 1/5
                $temp_dm          = 1/5;
                $dm_temp          = 5;
            }
            if ($temp_compare_dm == 7) {
                // 1/4
                $temp_dm          = 1/4;
                $dm_temp          = 4;
            }
            if ($temp_compare_dm == 8) {
                // 1/3
                $temp_dm          = 1/3;
                $dm_temp          = 3;
            }
            if ($temp_compare_dm == 9) {
                // 1/2
                $temp_dm          = 1/2;
                $dm_temp          = 2;
            }
            if ($temp_compare_dm == 10) {
                // 1/1
                $temp_dm          = 1;
                $dm_temp          = 1;
            }
            if ($temp_compare_dm == 11) {
                // 2/1
                $temp_dm          = 2;
                $dm_temp          = 1/2;
            }
            if ($temp_compare_dm == 12) {
                // 3/1
                $temp_dm          = 3;
                $dm_temp          = 1/3;
            }
            if ($temp_compare_dm == 13) {
                // 4/1
                $temp_dm          = 4;
                $dm_temp          = 1/4;
            }
            if ($temp_compare_dm == 14) {
                // 5/1
                $temp_dm          = 5;
                $dm_temp          = 1/5;
            }
            if ($temp_compare_dm == 15) {
                // 6/1
                $temp_dm          = 6;
                $dm_temp          = 1/6;
            }
            if ($temp_compare_dm == 16) {
                // 7/1
                $temp_dm          = 7;
                $dm_temp          = 1/7;
            }
            if ($temp_compare_dm == 17) {
                // 8/1
                $temp_dm          = 8;
                $dm_temp          = 1/8;
            }
            if ($temp_compare_dm == 18) {
                // 9/1
                $temp_dm          = 9;
                $dm_temp          = 1/9;
            }

            echo "CH_TEMP = " . $ch_temp . " - CH_DM = " . $ch_dm . " - TEMP_DM = " . $temp_dm . "<br>";
            echo "TEMP_CH = " . $temp_ch . " - DM_CH = " . $dm_ch . " - DM_TEMP = " . $dm_temp;

            $sum_column_ch      = 1 + $ch_temp + $temp_ch;
            $sum_column_temp    = 1 + $ch_dm + $dm_ch;
            $sum_column_dm      = 1 + $temp_dm + $dm_ch;

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
