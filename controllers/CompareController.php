<?php

namespace app\controllers;

use Yii;
use app\models\Compare;
use app\models\CompareSearch;
use app\models\ClimateAG;
use app\models\ClimateAGSearch;
use app\models\FactorsAG;
use app\models\FactorsAGSearch;
use app\models\LandnpeatAG;
use app\models\LandnpeatAGSearch;
use app\models\LandpeatAG;
use app\models\LandpeatAGSearch;
use app\models\AccessibilityAG;
use app\models\AccessibilityAGSearch;
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

        public function actionNodata()
    {

  		$climag = '';  	
    	$climate_ag = new ClimateAG();
    	$get_climag       = "SELECT * from climate_average_geometric";
        $value_climag    = Yii::$app->db->createCommand($get_climag)->queryAll();  
  		
  		$landnpag = '';  	
    	$landnp_ag = new LandnpeatAG();
    	$get_landnpag       = "SELECT * from 	landnpeat_average_geometry";
        $value_landnpag    = Yii::$app->db->createCommand($get_landnpag)->queryAll();  

  		$landpag = '';  	
    	$landp_ag = new LandpeatAG();
    	$get_landpag       = "SELECT * from 	landpeat_average_geometry";
        $value_landpag    = Yii::$app->db->createCommand($get_landpag)->queryAll();  

  		$accessag = '';  	
    	$access_ag = new AccessibilityAG();
    	$get_accessag       = "SELECT * from accessibility_avarage_geometric";
        $value_accessag    = Yii::$app->db->createCommand($get_accessag)->queryAll();  

        $factorag = '';
        $factor_ag = new FactorsAG();
    	$get_factors       = "SELECT * from factors_avarage_geometric";
        $value_factors    = Yii::$app->db->createCommand($get_factors)->queryAll();    
	        	if ($value_climag== null){
	    			$climag = "Pairwise Comparison Climate Yet Filled";
	    			if ($value_landnpag== null){
	    				$landnpag = "Pairwise Comparison Non Peat Land Yet Filled";
	    				if ($value_landpag== null){
	    					$landpag = "Pairwise Comparison Peat Land Yet Filled";
	    					if ($value_accessag== null){
	    						$accessag = "Pairwise Comparison Accessibility Yet Filled";
	    						if ($value_factors== null){
	    							$factorag = "Pairwise Comparison Factors Yet Filled";
	    						} else {}
	    					}else{
	    						if ($value_factors== null){
	    							$factorag = "Pairwise Comparison Factors Yet Filled";
	    						} else {}
	    					}
	    				}else{
	    					if ($value_accessag== null){
	    						$accessag = "Pairwise Comparison Accessibility Yet Filled";
	    						if ($value_factors== null){
	    							$factorag = "Pairwise Comparison Factors Yet Filled";
	    						} else {}
	    					}else{
	    						if ($value_factors== null){
	    							$factorag = "Pairwise Comparison Factors Yet Filled";
	    						} else {}
	    					}
	    				}
	    			}else{
	    				if ($value_landpag== null){
	    					$landpag = "Pairwise Comparison Peat Land Yet Filled";
	    					if ($value_accessag== null){
	    						$accessag = "Pairwise Comparison Accessibility Yet Filled";
	    						if ($value_factors== null){
	    							$factorag = "Pairwise Comparison Factors Yet Filled";
	    						} else {}
	    					}else{
	    						if ($value_factors== null){
	    							$factorag = "Pairwise Comparison Factors Yet Filled";
	    						} else {}
	    					}
	    				}else{
	    					if ($value_accessag== null){
	    						$accessag = "Pairwise Comparison Accessibility Yet Filled";
	    						if ($value_factors== null){
	    							$factorag = "Pairwise Comparison Factors Yet Filled";
	    						} else {}
	    					}else{
	    						if ($value_factors== null){
	    							$factorag = "Pairwise Comparison Factors Yet Filled";
	    						} else {}
	    					}
	    				}
	    			}
	    		}else{
	    			if ($value_landnpag== null){
	    				$landnpag = "Pairwise Comparison Non Peat Land Yet Filled";
	    				if ($value_landpag== null){
	    					$landpag = "Pairwise Comparison Peat Land Yet Filled";
	    					if ($value_accessag== null){
	    						$accessag = "Pairwise Comparison Accessibility Yet Filled";
	    						if ($value_factors== null){
	    							$factorag = "Pairwise Comparison Factors Yet Filled";
	    						} else {}
	    					}else{
	    						if ($value_factors== null){
	    							$factorag = "Pairwise Comparison Factors Yet Filled";
	    						} else {}
	    					}
	    				}else{
	    					if ($value_accessag== null){
	    						$accessag = "Pairwise Comparison Accessibility Yet Filled";
	    						if ($value_factors== null){
	    							$factorag = "Pairwise Comparison Factors Yet Filled";
	    						} else {}
	    					}else{
	    						if ($value_factors== null){
	    							$factorag = "Pairwise Comparison Factors Yet Filled";
	    						} else {}
	    					}
	    				}
	    			}else{
	    				if ($value_landpag== null){
	    					$landpag = "Pairwise Comparison Peat Land Yet Filled";
	    					if ($value_accessag== null){
	    						$accessag = "Pairwise Comparison Accessibility Yet Filled";
	    						if ($value_factors== null){
	    							$factorag = "Pairwise Comparison Factors Yet Filled";
	    						} else {}
	    					}else{
	    						if ($value_factors== null){
	    							$factorag = "Pairwise Comparison Factors Yet Filled";
	    						} else {}
	    					}
	    				}else{
	    					if ($value_accessag== null){
	    						$accessag = "Pairwise Comparison Accessibility Yet Filled";
	    						if ($value_factors== null){
	    							$factorag = "Pairwise Comparison Factors Yet Filled";
	    						} else {}
	    					}else{
	    						if ($value_factors== null){
	    							$factorag = "Pairwise Comparison Factors Yet Filled";
	    						} else {}
	    					}
	    				}
	    			}
	    		}












        return $this->render('nodata', [
        	'climag'=> $climag,
        	'landnpag'=> $landnpag,
        	'landpag'=> $landpag,
        	'accessag'=> $accessag,
        	'factorag'=> $factorag

        ]);
    }

    /**
     * Displays a single Compare model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $model = $this->findModel($id);

        $query_geom_to_geojson          = "SELECT ST_ASGEOJSON('".$model->geom."')";
        $query_geom_to_geojson_values   = Yii::$app->db->createCommand($query_geom_to_geojson)->queryColumn();
        $query_geom_to_geojson_value    = $query_geom_to_geojson_values[0];

        $datas_json                     = json_decode($model->data, TRUE);
        $datas                          = $datas_json['features'];
        
        /*$data_chart                     = '';
        $data_chart                     .= '[';
        for ($i=0; $i < count($datas); $i++) { 
            if ($i === (count($datas) - 1 )) {
                //$data_chart                 .= "{value:" . $datas[$i]['properties']['id'] . ",";
                $data_chart                 .= "color:'#F7464A',highlight: '#FF5A5E',";
                $data_chart                 .= "label:" . $datas[$i]['properties']['status_suitability'] . "}";
            }else{
                //$data_chart                 .= "{value:" . $datas[$i]['properties']['id'] . ",";
                $data_chart                 .= "color:'#F7464A',highlight: '#FF5A5E',";
                $data_chart                 .= "label:" . $datas[$i]['properties']['status_suitability'] . "},";
            }
        }

        $data_chart                     .= ']';*/

        return $this->render('view', [
            'model' => $model,
            //'data_chart' => $data_chart,
            'query_geom_to_geojson_value' => $query_geom_to_geojson_value
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

        if (Yii::$app->request->post()) {

            ini_set("memory_limit", "-1");
            
            /***
             * Langkah - langkah mengambil data kesesuaian lahan
             * 1. INTERSECTS (TRUE | FALSE)
             * 2. INTERSECTION (Kesesuain To Geom from draw)
             *
             * S = geom from draw
             * B = Hasil intersects
             **/
            $get_intersection       = "SELECT b.*, ST_AsGeojson(ST_intersection(b.geom,ST_GeomFromText('".$_POST['Compare']['geom']."', 4326))) as geom, (ST_Area(ST_Transform(ST_intersection(b.geom,ST_GeomFromText('".$_POST['Compare']['geom']."', 4326)), 32750)) * 0.0001) as luas from (select kesesuaian.*, st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),kesesuaian.geom)as touch from kesesuaian where st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),kesesuaian.geom) = true and kesesuaian.ket_land = 'bukan gambut') as b;";
            $value_intersections    = Yii::$app->db->createCommand($get_intersection)->queryAll();      

            $get_intersection_peat       = "SELECT b.*, ST_AsGeojson(ST_intersection(b.geom,ST_GeomFromText('".$_POST['Compare']['geom']."', 4326))) as geom, (ST_Area(ST_Transform(ST_intersection(b.geom,ST_GeomFromText('".$_POST['Compare']['geom']."', 4326)), 32750)) * 0.0001) as luas from (select kesesuaian.*, st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),kesesuaian.geom)as touch from kesesuaian where st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),kesesuaian.geom) = true and kesesuaian.ket_land = 'gambut') as b;";
            $value_intersections_peat    = Yii::$app->db->createCommand($get_intersection_peat)->queryAll();   

            $area_of_interest       = "SELECT ST_AsGeoJson(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326))";
            $aoi                    = Yii::$app->db->createCommand($area_of_interest)->queryAll();

            /***
             * Get Average Geometry Climate
             **/
            $climate_ag             = ClimateAG::find()->OrderBy('id DESC')->one();
            $landnp_ag             = LandnpeatAG::find()->OrderBy('id DESC')->one();
            $landp_ag             = LandpeatAG::find()->OrderBy('id DESC')->one();
            $accessibility_ag             = AccessibilityAG::find()->OrderBy('id DESC')->one();

            /***
             * Get Average Geometry Factor
             **/
            $factors_ag             = FactorsAG::find()->OrderBy('id DESC')->one();

            /* Deklarasi variable result geojson */
            $result_geojson         = '{"type": "FeatureCollection","features": [';
            
            if (isset($climate_ag)){
            	if (isset($landnp_ag)){
            		if (isset($landp_ag)){
            			if (isset($accessibility_ag)){
            				if (isset($factors_ag)){

									for ($i=0; $i < count($value_intersections); $i++) { 
                                	// print_r($value_intersections[$i]['scoredept']);
                                	// die;
									if (isset($value_intersections[$i]['scoredept']))	{									
                                    $kesesuaian_nonpeat         = ($value_intersections[$i]['scorech'] * ($climate_ag->bobot_ch * $factors_ag->bobot_climate)) + ($value_intersections[$i]['scoresuhu'] * ($climate_ag->boobt_temp * $factors_ag->bobot_climate)) + ($value_intersections[$i]['scoredry'] * ($climate_ag->bobot_dm * $factors_ag->bobot_climate)) + ($value_intersections[$i]['score_text'] * ($landnp_ag->bobot_text * $factors_ag->bobot_land)) + ($value_intersections[$i]['score_lrg'] * ($landnp_ag->bobot_slope * $factors_ag->bobot_land)) + ($value_intersections[$i]['score_elev'] * ($landnp_ag->bobot_elev * $factors_ag->bobot_land)) + ($value_intersections[$i]['score_road'] * ($accessibility_ag->bobot_road * $factors_ag->bobot_accessibility)) + ($value_intersections[$i]['score_mill'] * ($accessibility_ag->bobot_mills * $factors_ag->bobot_accessibility)) + ($value_intersections[$i]['score_town'] * ($accessibility_ag->bobot_town * $factors_ag->bobot_accessibility));
                                    $kesesuaian_konstraint		= $kesesuaian_nonpeat * ($value_intersections[$i]['cont_sunga']) * ($value_intersections[$i]['consrtrw']) * ($value_intersections[$i]['const_kwsn']) * ($value_intersections[$i]['const_mukim']) * ($value_intersections[$i]['cons_pipib']) ;
                                    $status_suitability             = 'N';
                                    if ($kesesuaian_konstraint >= 0 AND $kesesuaian_konstraint <= 1) {
                                        $status_suitability         = 'Not Suitable';
                                    }elseif ($kesesuaian_konstraint > 1 AND $kesesuaian_konstraint <= 2) {
                                        $status_suitability         = 'Mostly Suitable';
                                    }elseif ($kesesuaian_konstraint > 2 AND $kesesuaian_konstraint <= 3) {
                                        $status_suitability         = 'Suitable';
                                    }elseif ($kesesuaian_konstraint > 3 AND $kesesuaian_konstraint <= 4) {
                                        $status_suitability         = 'Very Suitable';
                                    }else{
                                        $status_suitability         = 'S(alah)';
                                    }
	                                    
                                    $result_geojson .= "{\"type\": \"Feature\",\"properties\": {\"kesesuaian\":\"".$kesesuaian_konstraint."\", \"status_suitability\":\"".$status_suitability."\", \"ket_ch\":\"".$value_intersections[$i]['ket_ch']."\", \"ket_suhu\":\"".$value_intersections[$i]['ket_suhu']."\", \"ket_dm\":\"".$value_intersections[$i]['ket_dm']."\", \"ket_lrg\":\"".$value_intersections[$i]['ket_lrg']."\", \"ket_text\":\"".$value_intersections[$i]['ket_text']."\", \"ket_elev\":\"".$value_intersections[$i]['ket_elev']."\", \"ket_thick\":\"".$value_intersections[$i]['ket_thick']."\", \"ket_peat_ripe\":\"".$value_intersections[$i]['ket_peat_ripe']."\", \"distance_r\":\"".$value_intersections[$i]['distance_r']."\", \"distance_m\":\"".$value_intersections[$i]['distance_m']."\", \"distance_k\":\"".$value_intersections[$i]['distance_k']."\", \"ket_cons_sung\":\"".$value_intersections[$i]['ket_cons_sung']."\", \"ket_rtrw\":\"".$value_intersections[$i]['ket_rtrw']."\", \"ket_kwsn\":\"".$value_intersections[$i]['ket_kwsn']."\", \"ket_mukim\":\"".$value_intersections[$i]['ket_mukim']."\", \"ket_pipib\":\"".$value_intersections[$i]['ket_pipib']."\", \"luas\":\"".$value_intersections[$i]['luas']."\"},\"geometry\": ";
                                    $result_geojson .= $value_intersections[$i]['geom'];
                                    $result_geojson .= "},";
					            }}
                                for ($i=0; $i < count($value_intersections_peat); $i++) { 
                                	if (isset($value_intersections[$i]['score_text']))	{	
                                	// print_r($value_intersections_peat[$i]['scoredept']);
                                	// die;
                                    $kesesuaian_peat         		= ($value_intersections_peat[$i]['scorech'] * ($climate_ag->bobot_ch * $factors_ag->bobot_climate)) + ($value_intersections_peat[$i]['scoresuhu'] * ($climate_ag->boobt_temp * $factors_ag->bobot_climate)) + ($value_intersections_peat[$i]['scoredry'] * ($climate_ag->bobot_dm * $factors_ag->bobot_climate)) + ($value_intersections_peat[$i]['scoreripe'] * ($landp_ag->bobot_ripe * $factors_ag->bobot_land)) + ($value_intersections_peat[$i]['score_lrg'] * ($landp_ag->bobot_slope * $factors_ag->bobot_land)) + ($value_intersections_peat[$i]['scoredept'] * ($landp_ag->bobot_thick * $factors_ag->bobot_land)) + ($value_intersections_peat[$i]['score_road'] * ($accessibility_ag->bobot_road * $factors_ag->bobot_accessibility)) + ($value_intersections_peat[$i]['score_mill'] * ($accessibility_ag->bobot_mills * $factors_ag->bobot_accessibility)) + ($value_intersections[$i]['score_town'] * ($accessibility_ag->bobot_town * $factors_ag->bobot_accessibility));
                                    $kesesuaian_konstraint_peat		= $kesesuaian_peat * ($value_intersections_peat[$i]['cont_sunga']) * ($value_intersections_peat[$i]['consrtrw']) * ($value_intersections_peat[$i]['const_kwsn']) * ($value_intersections_peat[$i]['const_mukim']) * ($value_intersections_peat[$i]['cons_pipib']) ;
                                    $status_suitability             = 'N';
                                    if ($kesesuaian_konstraint_peat >= 0 AND $kesesuaian_konstraint_peat <= 1) {
                                        $status_suitability         = 'Not Suitable';
                                    }elseif ($kesesuaian_konstraint_peat > 1 AND $kesesuaian_konstraint_peat <= 2) {
                                        $status_suitability         = 'Mostly Suitable';
                                    }elseif ($kesesuaian_konstraint_peat > 2 AND $kesesuaian_konstraint_peat <= 3) {
                                        $status_suitability         = 'Suitable';
                                    }elseif ($kesesuaian_konstraint_peat > 3 AND $kesesuaian_konstraint_peat <= 4) {
                                        $status_suitability         = 'Very Suitable';
                                    }else{
                                        $status_suitability         = 'S(alah)';
                                    }

                                    $result_geojson .= "{\"type\": \"Feature\",\"properties\": {\"kesesuaian\":\"".$kesesuaian_konstraint_peat."\", \"status_suitability\":\"".$status_suitability."\", \"ket_ch\":\"".$value_intersections_peat[$i]['ket_ch']."\", \"ket_suhu\":\"".$value_intersections_peat[$i]['ket_suhu']."\", \"ket_dm\":\"".$value_intersections_peat[$i]['ket_dm']."\", \"ket_lrg\":\"".$value_intersections_peat[$i]['ket_lrg']."\", \"ket_text\":\"".$value_intersections_peat[$i]['ket_text']."\", \"ket_elev\":\"".$value_intersections_peat[$i]['ket_elev']."\", \"ket_thick\":\"".$value_intersections_peat[$i]['ket_thick']."\", \"ket_peat_ripe\":\"".$value_intersections_peat[$i]['ket_peat_ripe']."\", \"distance_r\":\"".$value_intersections_peat[$i]['distance_r']."\", \"distance_m\":\"".$value_intersections_peat[$i]['distance_m']."\", \"distance_k\":\"".$value_intersections_peat[$i]['distance_k']."\", \"ket_cons_sung\":\"".$value_intersections_peat[$i]['ket_cons_sung']."\", \"ket_rtrw\":\"".$value_intersections_peat[$i]['ket_rtrw']."\", \"ket_kwsn\":\"".$value_intersections_peat[$i]['ket_kwsn']."\", \"ket_mukim\":\"".$value_intersections_peat[$i]['ket_mukim']."\", \"ket_pipib\":\"".$value_intersections_peat[$i]['ket_pipib']."\", \"luas\":\"".$value_intersections_peat[$i]['luas']."\"},\"geometry\": ";
                                    $result_geojson .= $value_intersections_peat[$i]['geom'];
                                    $result_geojson .= "},";
                                }}
					            $result_geojson         .= ']}';
					            $result_data            = substr($result_geojson, 0, -3) . ' ]}';

					            /* Convert WKT to Geom */
					            $query_geom_from_wkt    = "SELECT ST_GeomFromText('".$_POST['Compare']['geom']."', 4326), (ST_Area(ST_Transform(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),32750))* 0.0001) as st_area";
					            $result_geom_from_wkt   = Yii::$app->db->createCommand($query_geom_from_wkt)->queryAll();



					            /* Climate Rainfall */

								$get_rainfall  		    = "SELECT b.scorech as scorech,ST_AsGeojson(st_union(st_intersection(b.geom,ST_GeomFromText('".$_POST['Compare']['geom']."', 4326))))as geom from (select u.*, st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom)as touch from  kesesuaian as u where st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom) = true) as b group by b.scorech;";
					            $value_rainfall    		= Yii::$app->db->createCommand($get_rainfall)->queryAll();      
					            $result_geojson_rain     = '{"type": "FeatureCollection","features": [';
					            for ($i=0; $i < count($value_rainfall); $i++) { 
					            	$scorech					 = $value_rainfall[$i]['scorech'];
					                $status_rainfall             = ' ';
					                if ($scorech <= 1) {
					                    $status_rainfall        = '< 1250, > 4000';
					                }elseif ($scorech <= 2 and $scorech > 1 ) {
					                    $status_rainfall         = '1250 - 1450, 3500 - 4000';
					                }elseif ($scorech <= 3 and $scorech > 2) {
					                    $status_rainfall         = '1450 - 1700, 2500 - 3500';
					                }elseif ($scorech <= 4 and $scorech > 3) {
					                    $status_rainfall         = '1700 - 2500';
					                }else{
					                    $status_rainfall         = 'S(alah)';
					                }
					                $result_geojson_rain .= "{\"type\": \"Feature\",\"properties\": {\"scorech\":\"".$scorech."\", \"status_rainfall\":\"".$status_rainfall."\"},\"geometry\": ";
					                $result_geojson_rain .= $value_rainfall[$i]['geom'];
					                $result_geojson_rain .= "},";
					            }
					            $result_geojson_rain         .= ']}';
					            $result_data_rain             = substr($result_geojson_rain, 0, -3) . ' ]}';


								/* Climate Temperature */

								$get_temperature  		    = "SELECT b.scoresuhu as scoresuhu, ST_AsGeojson(st_union(st_intersection(b.geom,ST_GeomFromText('".$_POST['Compare']['geom']."', 4326))))as geom from (select u.*, st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom)as touch from  kesesuaian as u where st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom) = true) as b group by b.scoresuhu;";
					            $value_temperature    		= Yii::$app->db->createCommand($get_temperature)->queryAll();      
					            $result_geojson_temp     = '{"type": "FeatureCollection","features": [';
					            for ($i=0; $i < count($value_temperature); $i++) { 
					            	$scoresuhu					 = $value_temperature[$i]['scoresuhu'];
					                $status_temperature             = ' ';
					                if ($scoresuhu <= 1) {
					                    $status_temperature        = '< 20, > 35';
					                }elseif ($scoresuhu <= 2 and $scoresuhu > 1 ) {
					                    $status_temperature         = '20 - 22, 32 - 35 ';
					                }elseif ($scoresuhu <= 3 and $scoresuhu > 2) {
					                    $status_temperature         = '22 - 25, 28 - 32';
					                }elseif ($scoresuhu <= 4 and $scoresuhu > 3) {
					                    $status_temperature         = '25 - 28';
					                }else{
					                    $status_temperature         = 'S(alah)';
					                }
					                $result_geojson_temp .= "{\"type\": \"Feature\",\"properties\": {\"scoresuhu\":\"".$scoresuhu."\", \"status_temperature\":\"".$status_temperature."\"},\"geometry\": ";
					                $result_geojson_temp .= $value_temperature[$i]['geom'];
					                $result_geojson_temp .= "},";
					            }
					            $result_geojson_temp         .= ']}';
					            $result_data_temp             = substr($result_geojson_temp, 0, -3) . ' ]}';


					            /* Climate Dry Month */

								$get_drymonth  		    = "SELECT b.scoredry as scoredry ,ST_AsGeojson(st_union(st_intersection(b.geom,ST_GeomFromText('".$_POST['Compare']['geom']."', 4326))))as geom from (select u.*, st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom)as touch from  kesesuaian as u where st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom) = true) as b group by b.scoredry;";
					            $value_drymonth    		= Yii::$app->db->createCommand($get_drymonth)->queryAll();      
					            $result_geojson_dm     = '{"type": "FeatureCollection","features": [';
					            for ($i=0; $i < count($value_drymonth); $i++) { 
					            	$scoredry					 = $value_drymonth[$i]['scoredry'];
					                $status_drymonth             = '> 4';;
					                if ($scoredry <= 1) {
					                    $status_drymonth        = '> 4';
					                }elseif ($scoredry <= 2 and $scoredry > 1 ) {
					                    $status_drymonth         = '3 – 4';
					                }elseif ($scoredry <= 3 and $scoredry > 2) {
					                    $status_drymonth         = '3 – 2';
					                }elseif ($scoredry <= 4 and $scoredry > 3) {
					                    $status_drymonth         = '< 2';
					                }else{
					                    $status_drymonth         = 'S(alah)';
					                }
					                $result_geojson_dm .= "{\"type\": \"Feature\",\"properties\": {\"scoredry\":\"".$scoredry."\", \"status_drymonth\":\"".$status_drymonth."\"},\"geometry\": ";
					                $result_geojson_dm .= $value_drymonth[$i]['geom'];
					                $result_geojson_dm .= "},";
					            }
					            $result_geojson_dm         .= ']}';
					            $result_data_dm             = substr($result_geojson_dm, 0, -3) . ' ]}';

					            /* Land slope */

					            $get_slope            = "SELECT b.score_lrg as score_lrg ,ST_AsGeojson(st_union(st_intersection(b.geom,ST_GeomFromText('".$_POST['Compare']['geom']."', 4326))))as geom from (select u.*, st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom)as touch from  kesesuaian as u where st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom) = true) as b group by b.score_lrg order by b.score_lrg asc;";
					            $value_slope          = Yii::$app->db->createCommand($get_slope)->queryAll();      
					            $result_geojson_slp     = '{"type": "FeatureCollection","features": [';
					            for ($i=0; $i < count($value_slope); $i++) { 
					                $score_lrg                   = $value_slope[$i]['score_lrg'];                
					                $status_slope             = '>30';
					                if ($score_lrg <= 1) {
					                    $status_slope        = '>30';
					                }elseif ($score_lrg <= 2 and $score_lrg > 1 ) {
					                    $status_slope         = '16 - 30';
					                }elseif ($score_lrg <= 3 and $score_lrg > 2) {
					                    $status_slope         = '8 - 16';
					                }elseif ($score_lrg <= 4 and $score_lrg > 3) {
					                    $status_slope         = '<8';
					                }else{
					                    $status_slope         = 'S(alah)';
					                }

					                $result_geojson_slp .= "{\"type\": \"Feature\",\"properties\": {\"score_lrg\":\"".$score_lrg."\", \"status_slope\":\"".$status_slope."\"},\"geometry\": ";
					                $result_geojson_slp .= $value_slope[$i]['geom'];
					                $result_geojson_slp .= "},";
					            }
					            $result_geojson_slp         .= ']}';
					            $result_data_slp             = substr($result_geojson_slp, 0, -3) . ' ]}';


					            /* Land  Non Peat Texture */



					            $get_texture           = "SELECT b.score_text as score_text ,ST_AsGeojson(st_union(st_intersection(b.geom,ST_GeomFromText('".$_POST['Compare']['geom']."', 4326))))as geom from (select u.*, st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom)as touch from  kesesuaian as u where st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom) = true) as b group by b.score_text;";
					            $value_texture         = Yii::$app->db->createCommand($get_texture)->queryAll();      
					            $result_geojson_txt     = '{"type": "FeatureCollection","features": [';
					            for ($i=0; $i < count($value_texture); $i++) { 
					                $score_text                    = $value_texture[$i]['score_text'];
					                $status_texture             = 'Peat Area';
					                if ($score_text <= 1) {
					                    $status_texture        = 'Coarse';
					                }elseif ($score_text <= 2 and $score_text > 1 ) {
					                    $status_texture         = 'Slightly Coarse';
					                }elseif ($score_text <= 3 and $score_text > 2) {
					                    $status_texture         = '–';
					                }elseif ($score_text <= 4 and $score_text > 3) {
					                    $status_texture         = 'Fine, Slightly fine, Medium';
					                }else{
					                    $status_texture         = 'Peat Area';
					                }
					                $result_geojson_txt .= "{\"type\": \"Feature\",\"properties\": {\"score_text\":\"".$score_text."\", \"status_texture\":\"".$status_texture."\"},\"geometry\": ";
					                $result_geojson_txt .= $value_texture[$i]['geom'];
					                $result_geojson_txt .= "},";
					            }
					            $result_geojson_txt         .= ']}';
					            $result_data_txt             = substr($result_geojson_txt, 0, -3) . ' ]}';

					            /* Land Non Peat Elevation */

					            $get_elevation           = "SELECT b.score_elev as score_elev ,ST_AsGeojson(st_union(st_intersection(b.geom,ST_GeomFromText('".$_POST['Compare']['geom']."', 4326))))as geom from (select u.*, st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom)as touch from  kesesuaian as u where st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom) = true) as b group by b.score_elev;";
					            $value_elevation         = Yii::$app->db->createCommand($get_elevation)->queryAll();      
					            $result_geojson_elev     = '{"type": "FeatureCollection","features": [';
					            for ($i=0; $i < count($value_elevation); $i++) { 
					                $score_elev                    = $value_elevation[$i]['score_elev'];
					                $status_elevation             = 'Peat Area';
					                if ($score_elev <= 1) {
					                    $status_elevation        = '> 400';
					                }elseif ($score_elev <= 2 and $score_elev > 1 ) {
					                    $status_elevation         = '300 - 400';
					                }elseif ($score_elev <= 3 and $score_elev > 2) {
					                    $status_elevation         = '200 - 300';
					                }elseif ($score_elev <= 4 and $score_elev > 3) {
					                    $status_elevation         = '0 - 200';
					                }else{
					                    $status_elevation         = 'Peat Area';
					                }
					                $result_geojson_elev .= "{\"type\": \"Feature\",\"properties\": {\"score_elev\":\"".$score_elev."\", \"status_elevation\":\"".$status_elevation."\"},\"geometry\": ";
					                $result_geojson_elev .= $value_elevation[$i]['geom'];
					                $result_geojson_elev .= "},";
					                // print_r($status_elevation);
					            }
					            // die;
					            $result_geojson_elev         .= ']}';
					            $result_data_elev             = substr($result_geojson_elev, 0, -3) . ' ]}';


					            /* Land Peat Thickness */

					            $get_thickness           = "SELECT b.scoredept as scoredept ,ST_AsGeojson(st_union(st_intersection(b.geom,ST_GeomFromText('".$_POST['Compare']['geom']."', 4326))))as geom from (select u.*, st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom)as touch from  kesesuaian as u where st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom) = true) as b group by b.scoredept;";
					            $value_thickness         = Yii::$app->db->createCommand($get_thickness)->queryAll();      
					            $result_geojson_thick     = '{"type": "FeatureCollection","features": [';
					            for ($i=0; $i < count($value_thickness); $i++) { 
					                $scoredept                    = $value_thickness[$i]['scoredept'];
					                $status_thickness             = 'Non Peat Area';
					                if ($scoredept <= 1 and $scoredept > 0 ) {
					                    $status_thickness        = '< 140';
					                }elseif ($scoredept <= 2 and $scoredept > 1 ) {
					                    $status_thickness         = '140 – 200';
					                }elseif ($scoredept <= 3 and $scoredept > 2) {
					                    $status_thickness         = '200 – 400';
					                }elseif ($scoredept <= 4 and $scoredept > 3) {
					                    $status_thickness         = '> 400';
					                }else{
					                    $status_thickness         = 'Non Peat Area';
					                }
					                $result_geojson_thick .= "{\"type\": \"Feature\",\"properties\": {\"scoredept\":\"".$scoredept."\", \"status_thickness\":\"".$status_thickness."\"},\"geometry\": ";
					                $result_geojson_thick .= $value_thickness[$i]['geom'];
					                $result_geojson_thick .= "},";
					            }
					            $result_geojson_thick         .= ']}';
					            $result_data_thick             = substr($result_geojson_thick, 0, -3) . ' ]}';


					            /* Land Peat Ripe */

					            $get_ripening           = "SELECT b.scoreripe as scoreripe ,ST_AsGeojson(st_union(st_intersection(b.geom,ST_GeomFromText('".$_POST['Compare']['geom']."', 4326))))as geom from (select u.*, st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom)as touch from  kesesuaian as u where st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom) = true) as b group by b.scoreripe;";
					            $value_ripening         = Yii::$app->db->createCommand($get_ripening)->queryAll();      
					            $result_geojson_ripe     = '{"type": "FeatureCollection","features": [';
					            for ($i=0; $i < count($value_ripening); $i++) { 
					                $scoreripe                    = $value_ripening[$i]['scoreripe'];
					                $status_ripening             = 'Non Peat Area';
					                if ($scoreripe <= 1 and $scoreripe > 0 ) {
					                    $status_ripening        = 'Sapric*';
					                }elseif ($scoreripe <= 2 and $scoreripe > 1 ) {
					                    $status_ripening         = 'Sapric, Hemic*';
					                }elseif ($scoreripe <= 3 and $scoreripe > 2) {
					                    $status_ripening         = 'Hemic, Fibric*';
					                }elseif ($scoreripe <= 4 and $scoreripe > 3) {
					                    $status_ripening         = 'Fibric';
					                }else{
					                    $status_ripening         = 'Peat Area';
					                }
					                $result_geojson_ripe .= "{\"type\": \"Feature\",\"properties\": {\"scoreripe\":\"".$scoreripe."\", \"status_ripening\":\"".$status_ripening."\"},\"geometry\": ";
					                $result_geojson_ripe .= $value_ripening[$i]['geom'];
					                $result_geojson_ripe .= "},";
					            }
					            $result_geojson_ripe         .= ']}';
					            $result_data_ripe             = substr($result_geojson_ripe, 0, -3) . ' ]}';

					            /* Accessibility Distance From Road */

					            $get_road           = "SELECT b.score_road as score_road ,ST_AsGeojson(st_union(st_intersection(b.geom,ST_GeomFromText('".$_POST['Compare']['geom']."', 4326))))as geom from (select u.*, st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom)as touch from  kesesuaian as u where st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom) = true) as b group by b.score_road;";
					            $value_road         = Yii::$app->db->createCommand($get_road)->queryAll();      
					            $result_geojson_rod     = '{"type": "FeatureCollection","features": [';
					            for ($i=0; $i < count($value_road); $i++) { 
					                $score_road                    = $value_road[$i]['score_road'];
					                $status_road             = '-';
					                if ($score_road <= 1 and $score_road > 0 ) {
					                    $status_road        = '-';
					                }elseif ($score_road <= 2 and $score_road > 1 ) {
					                    $status_road         = '> 10 Km';
					                }elseif ($score_road <= 3 and $score_road > 2) {
					                    $status_road         = '5 - 10 Km';
					                }elseif ($score_road <= 4 and $score_road > 3) {
					                    $status_road         = '0 - 5 Km';
					                }else{
					                    $status_road         = 'S(alah)';
					                }
					                $result_geojson_rod .= "{\"type\": \"Feature\",\"properties\": {\"score_road\":\"".$score_road."\", \"status_road\":\"".$status_road."\"},\"geometry\": ";
					                $result_geojson_rod .= $value_road[$i]['geom'];
					                $result_geojson_rod .= "},";
					            }
					            $result_geojson_rod         .= ']}';
					            $result_data_rod             = substr($result_geojson_rod, 0, -3) . ' ]}';

					            /* Accessibility Distance From Mills */

					            $get_mills           = "SELECT b.score_mill as score_mill ,ST_AsGeojson(st_union(st_intersection(b.geom,ST_GeomFromText('".$_POST['Compare']['geom']."', 4326))))as geom from (select u.*, st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom)as touch from  kesesuaian as u where st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom) = true) as b group by b.score_mill;";
					            $value_mills         = Yii::$app->db->createCommand($get_mills)->queryAll();      
					            $result_geojson_mls     = '{"type": "FeatureCollection","features": [';
					            for ($i=0; $i < count($value_mills); $i++) { 
					                $score_mill                    = $value_mills[$i]['score_mill'];
					                $status_mills             = '-';
					                if ($score_mill <= 1 and $score_mill > 0 ) {
					                    $status_mills        = '-';
					                }elseif ($score_mill <= 2 and $score_mill > 1 ) {
					                    $status_mills         = '> 10 Km';
					                }elseif ($score_mill <= 3 and $score_mill > 2) {
					                    $status_mills         = '5 - 10 Km';
					                }elseif ($score_mill <= 4 and $score_mill > 3) {
					                    $status_mills         = '0 - 5 Km';
					                }else{
					                    $status_mills         = 'S(alah)';
					                }
					                $result_geojson_mls .= "{\"type\": \"Feature\",\"properties\": {\"score_mill\":\"".$score_mill."\", \"status_mills\":\"".$status_mills."\"},\"geometry\": ";
					                $result_geojson_mls .= $value_mills[$i]['geom'];
					                $result_geojson_mls .= "},";
					            }
					            $result_geojson_mls         .= ']}';
					            $result_data_mls             = substr($result_geojson_mls, 0, -3) . ' ]}';

					            /* Accessibility Distance From town */

					            $get_town           = "SELECT b.score_town as score_town ,ST_AsGeojson(st_union(st_intersection(b.geom,ST_GeomFromText('".$_POST['Compare']['geom']."', 4326))))as geom from (select u.*, st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom)as touch from  kesesuaian as u where st_intersects(ST_GeomFromText('".$_POST['Compare']['geom']."', 4326),u.geom) = true) as b group by b.score_town;";
					            $value_town         = Yii::$app->db->createCommand($get_town)->queryAll();      
					            $result_geojson_twn     = '{"type": "FeatureCollection","features": [';
					            for ($i=0; $i < count($value_town); $i++) { 
					                $score_town                    = $value_town[$i]['score_town'];
					                $status_town             = '-';
					                if ($score_town <= 1 and $score_town > 0 ) {
					                    $status_town        = '-';
					                }elseif ($score_town <= 2 and $score_town > 1 ) {
					                    $status_town         = '> 10 Km';
					                }elseif ($score_town <= 3 and $score_town > 2) {
					                    $status_town         = '5 - 10 Km';
					                }elseif ($score_town <= 4 and $score_town > 3) {
					                    $status_town         = '0 - 5 Km';
					                }else{
					                    $status_town         = 'S(alah)';
					                }
					                $result_geojson_twn .= "{\"type\": \"Feature\",\"properties\": {\"score_town\":\"".$score_town."\", \"status_town\":\"".$status_town."\"},\"geometry\": ";
					                $result_geojson_twn .= $value_town[$i]['geom'];
					                $result_geojson_twn .= "},";
					            }
					            $result_geojson_twn         .= ']}';
					            $result_data_twn             = substr($result_geojson_twn, 0, -3) . ' ]}';
						        } else {
						        	return $this->redirect(['nodata', 'id' => $model->id]);
						        }
						        } else {
						        	return $this->redirect(['nodata', 'id' => $model->id]);
						        }
						        } else {
						        	return $this->redirect(['nodata', 'id' => $model->id]);
						        }
						        } else {
						        	return $this->redirect(['nodata', 'id' => $model->id]);
						        }

        } else {
        	return $this->redirect(['nodata', 'id' => $model->id]);
        }
            /* Convert m2 to Ha (Ha = m2 ÷ 10,000)*/
            $data_st_area           = $result_geom_from_wkt[0]['st_area'];

            /* Intervensi POST with result */
            
            $_POST['Compare']['data']       = $result_data;
            $_POST['Compare']['geom']       = $result_geom_from_wkt[0]['st_geomfromtext'];
            $_POST['Compare']['st_area']    = $data_st_area;
            $_POST['Compare']['data_rain']  = $result_data_rain;
            $_POST['Compare']['data_temp']  = $result_data_temp;
            $_POST['Compare']['data_dm']  = $result_data_dm;
            $_POST['Compare']['data_slope']  = $result_data_slp;
            $_POST['Compare']['data_text']  = $result_data_txt;
            $_POST['Compare']['data_elev']  = $result_data_elev;
            $_POST['Compare']['data_thick']  = $result_data_thick;
            $_POST['Compare']['data_ripe']  = $result_data_ripe;
            $_POST['Compare']['data_road']  = $result_data_rod;
            $_POST['Compare']['data_mills']  = $result_data_mls;
            $_POST['Compare']['data_town']  = $result_data_twn;

            if (!Yii::$app->user->isGuest) {
                $_POST['Compare']['id_user']    = Yii::$app->user->identity->id;
            }
            // print_r($result_data);
            // die;



            if ($model->load($_POST) && $model->save()) {
                // print_r($model->getErrors());
                // die;
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                // print_r($model->getErrors());
                // die;
                echo "error";
            }
            
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
            $pathData           = Yii::getAlias('@webroot');
            
            /* Get Database Name & Database User */
            $data               = explode(";",Yii::$app->db->dsn);
            $Dbri               = $data[1];
            $dbName1            = explode("=",$Dbri);
            $db_name            = $dbName1[1];
            $db_user            = Yii::$app->db->username;
            $db_password        = Yii::$app->db->password;

            $_model             = new Compare();

            $_model->shp       = UploadedFile::getInstance($model, 'shp');



            if (($_model->shp)) {

                /* create folder with name = $this->tanggal() */
                $create_folder      = exec('mkdir ' .$pathData . '/uploads/shp/' . $prefix_dir);

                // print_r($pathData.'/uploads/shp'.$prefix_dir.'/'.$_model->shp->baseName.'.'.$_model->shp->extension);
                // die;

                /* save .zip to path @app/tms/$this->tanggal()/filename.zip */
                move_uploaded_file($_model->shp->tempName, $pathData. '/uploads/shp/' . $prefix_dir . '/' . $_model->shp->baseName . '.' . $_model->shp->extension);

                /* ekstrak filename.zip to filename.shp */

                $unzip                  = exec('unzip ' .Yii::getAlias('@webroot'). '/uploads/shp/' . $prefix_dir . '/' . $_model->shp->baseName . '.' . $_model->shp->extension . ' -d ' .Yii::getAlias('@webroot'). '/uploads/extract/' . $prefix_dir . '/');

                /* Get data file shp */
                $find_file_shp               = exec('find ' .Yii::getAlias('@webroot'). '/uploads/extract/' . $prefix_dir . '/*.shp', $file, $err);
// print_r($file);
// die;
                if ($file[0]) {

                    $proj4script        = "gdalsrsinfo -o proj4 $file[0]";

                    $proj4              = exec($proj4script);

                    $proj4              = str_replace("'", "", $proj4);

                    $getSrid            = Yii::$app->db->createCommand("SELECT srid FROM spatial_ref_sys WHERE proj4text like '%$proj4%'")->queryOne();

                    $epsg               = $getSrid['srid'];
// print_r($getSrid);
// die;

                    if($epsg !== null) {
                        $shp2pgsql      = exec('shp2pgsql -I -s $epsg:4326 -g the_geom '.$file[0].' upload.'.$prefix_dir.' >' .Yii::getAlias('@webroot'). '/uploads/extract/' . $prefix_dir . $_model->shp->baseName.'/.sql',$arr,$jj);
                        // $shp2sql        =   
print_r($arr);
die;


                        if($jj == 0) {

                            /* GET bounds */
                            $sqlGetBound    = "SELECT ST_ASGEOJSON(ST_Envelope(ST_ASTEXT(ST_Extent(ST_Transform(the_geom,4326))))) FROM $prefix_dir";
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

            return $this->redirect(['view', 'id' => $_model->id]);
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
