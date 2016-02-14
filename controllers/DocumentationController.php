<?php

namespace app\controllers;

use app\models\Tutorial;
use app\models\TutorialCategory;

class DocumentationController extends \yii\web\Controller
{
    public function actionIndex($id = FALSE)
    {
    	$tutorial 	= Tutorial::find()->AsArray()->all();
    	$category 	= TutorialCategory::find()->AsArray()->all();

    	for ($i=0; $i < count($category); $i++) { 
    			$idall[] 	= $category[$i]['id'];
	            }

    	if (empty($id)) {

	            $id = min($idall);

    	}

	            // print_r($id);
	            // die;
    	
    	$model 		= $this->findModel($id);

        return $this->render('index', [
        	'tutorial' => $tutorial,
        	'category' => $category,
        	'model' => $model
        ]);
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
        if (($model = Tutorial::find()->where(['id_category'=>$id])->AsArray()->all()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
