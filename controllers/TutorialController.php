<?php

namespace app\controllers;

use Yii;
use app\models\Tutorial;
use app\models\TutorialSearch;
use app\models\Tutorialcategory;
use app\models\TutorialcategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TutorialController implements the CRUD actions for Tutorial model.
 */
class TutorialController extends Controller
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
     * Lists all Tutorial models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TutorialSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $searchModelcategory = new TutorialcategorySearch();
        $dataProvidercategory = $searchModelcategory->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModelcategory' => $searchModelcategory,
            'dataProvidercategory' => $dataProvidercategory,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tutorial model.
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
     * Creates a new Tutorial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tutorial();

        if (Yii::$app->request->post()) {

            $nama_file                  = str_replace(['.'], [''], microtime(true));

            if ($model->image = UploadedFile::getInstance($model,'image')) {
                
                $model->image->saveAs( 'uploads/foto/'.$nama_file.'.'.$model->image->extension );
                
                /* save the path to DB */
                $_POST['Tutorial']['image'] = $nama_file . '.' . $model->image->extension;
                
                $model->load($_POST);

                if ($model->save()) {
                    return $this->redirect(['index']);
                }
            }else{
                $model->load($_POST);
                if ($model->save()) {
                    return $this->redirect(['index']);
                }
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tutorial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->post()) {

            $nama_file                  = str_replace(['.'], [''], microtime(true));

            if ($model->image = UploadedFile::getInstance($model,'image')) {
                
                $model->image->saveAs( 'uploads/foto/'.$nama_file.'.'.$model->image->extension );
                
                /* save the path to DB */
                $_POST['Tutorial']['image'] = $nama_file . '.' . $model->image->extension;
                
                $model->load($_POST);

                if ($model->save()) {
                    return $this->redirect(['index']);
                }
            }else{
                $model->load($_POST);
                if ($model->save()) {
                    return $this->redirect(['index']);
                }
            }
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tutorial model.
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
     * Finds the Tutorial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tutorial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tutorial::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
