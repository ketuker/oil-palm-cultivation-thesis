<?php

namespace app\controllers;

use Yii;
use app\models\Compare;
use app\models\CompareSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CompareController implements the CRUD actions for Compare model.
 */
class CompareController extends Controller
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
     * Lists all Compare models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompareSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Compare model.
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
     * Creates a new Compare model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatedraw()
    {
        $model = new Compare();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            $get_geojson_kecamatan  = "SELECT *, ST_AsGeoJson(geom), ST_X(ST_Centroid(geom)), ST_Y(ST_Centroid(geom)) FROM admin";
            $data_admin             = Yii::$app->db->createCommand($get_geojson_kecamatan)->queryAll();

            $get_bbox               = "SELECT ST_AsGeoJson(Box2D(ST_Union(geom))) FROM admin";
            $bbox_geojsons          = Yii::$app->db->createCommand($get_bbox)->queryColumn();
            $bbox_geojson           = $bbox_geojsons[0];

            return $this->render('createdraw', [
                'model' => $model,
                'data_admin' => $data_admin,
                'bbox_geojson' => $bbox_geojson
            ]);
        }
    }

    public function Tanggal()
    {
        date_default_timezone_set('Asia/Jakarta');
        return 'date_'.date("d_M_Y_").'time'.date("_H_i_s");
    }

    /**
     * Creates a new Compare model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateupload()
    {
        $model = new Compare();

        if (Yii::$app->request->post()) {

            $prefix_dir         = $this->tanggal();

            /* Get User Name & User ID */
            $username           = Yii::$app->user->identity->username;
            $id_user            = Yii::$app->user->identity->id;
        
            /* Get Directory Web Root */        
            $pathData           = Yii::getAlias('@web');
            
            /* Get Database Name & Database User */
            $data               = explode(";",Yii::$app->db->dsn);
            $Dbri               = $data[1];
            $dbName1            = explode("=",$Dbri);
            $db_name            = $dbName1[1];
            $db_user            = Yii::$app->db->username;
            $db_password        = Yii::$app->db->password;

            $_model             = new Compare();

            $_model->data       = UploadedFile::getInstance($model, 'data');

            if ($_model->data) {

                /* create folder with name = $this->tanggal() */
                $create_folder      = exec('mkdir ' .Yii::getAlias('@web') . '/uploads/' . $prefix_dir);

                /* save .zip to path @app/tms/$this->tanggal()/filename.zip */
                move_uploaded_file($_model->data->tempName, Yii::getAlias('@web') . '/uploads/' . $prefix_dir . '/' . $_model->data->baseName . '.' . $_model->data->extension);

                /* ekstrak filename.zip to filename.shp */
                $unzip                  = exec('unzip ' .Yii::getAlias('@web') . '/uploads/' . $prefix_dir . '/' . $_model->data->baseName . '.' . $_model->data->extension . ' -d ' .Yii::getAlias('@web') . '/' . $prefix_dir . '/');

                /* Get data file shp */
                $find_file_shp               = exec('find ' .Yii::getAlias('@tms') . '/uploads/' . $prefix_dir . '/*.shp', $file, $err);

                if ($file[0]) {

                    $proj4script        = "gdalsrsinfo -o proj4 $file[0]";

                    $proj4              = exec($proj4script);

                    $proj4              = str_replace("'", "", $proj4);

                    $getSrid            = Yii::$app->db->createCommand("SELECT srid FROM spatial_ref_sys WHERE proj4text like '%$proj4%'")->queryOne();

                    $epsg               = $getSrid['srid'];

                    if($epsg !== null) {
                        $shp2pgsql      = exec("shp2pgsql -I -s $epsg:4326 -g \"the_geom\" ".$file[0].' public.'.$prefix_dir.' | psql -U '.$db_user.' -d '.$db_name,$arr,$jj);

                        if($jj == 0) {

                            /* GET bounds */
                            $sqlGetBound    = "SELECT ST_ASGEOJSON(ST_Envelope(ST_ASTEXT(ST_Extent(ST_TRANSFORM(the_geom,4326))))) FROM $prefix_dir";
                            $dataGetBound   = Yii::$app->db->createCommand($sqlGetBound)->queryOne();
                            $jadi_bound     = $dataGetBound['st_asgeojson'];

                            /* Check geometry type */
                            $sqlGetMarker   = "SELECT Geometrytype(the_geom) FROM $prefix_dir limit 1";
                            $dataGetMarker  = Yii::$app->db->createCommand($sqlGetMarker)->queryOne();
                            $geom_type      = $dataGetMarker['geometrytype'];

                            /* Get Column Name */
                            $sqlGetColumn   = "select column_name from information_schema.columns where table_name='".$prefix_dir."'";
                            $dataGetColumn  = Yii::$app->db->createCommand($sqlGetColumn)->queryColumn();
                            array_shift($dataGetColumn);
                            array_pop($dataGetColumn);
                            $string_column_name     = implode(',', $dataGetColumn);

                            /* Save to model Data */
                            $model->name                = $data_name;
                            $model->description         = 'Description data shp ' . $tanggal;
                            $model->extension           = 'shp';
                            $model->table_name          = $prefix_dir;
                            $model->type                = $geom_type;
                            $model->bounds              = $jadi_bound;
                            $model->path                = $file[0];
                            $model->popup               = $string_column_name;
                            $model->is_public           = TRUE;
                            $model->id_user_created     = $id_user;

                            if ($model->save()) {
                                $re_url             =  Url::to(['update','id'=>$model->id]);
                                echo \yii\helpers\Json::encode(['output'=>$re_url, 'message'=>'']);
                            } else {
                                /* if failed to save data */
                                header("HTTP/1.0 500 Internal Server Error");
                            }
                        }
                    }
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('createupload', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Compare model.
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
     * Deletes an existing Compare model.
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
     * Finds the Compare model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Compare the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Compare::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
