<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Advusr;

/**
 * AdvusrSearch represents the model behind the search form about `app\models\Advusr`.
 */
class AdvusrSearch extends Advusr
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user'], 'integer'],
            [['skenario', 'dates'], 'safe'],
            [['ch_temp', 'ch_dm', 'temp_dm', 'bobot_ch', 'bobot_temp', 'bobot_dm', 'cr_climate', 'slope_text', 'slope_elev', 'text_elev', 'bobot_slopenp', 'bobot_text', 'bobot_elev', 'cr_landnpeat', 'slope_thick', 'slope_ripe', 'thick_ripe', 'bobot_slopep', 'bobot_thick', 'bobot_ripe', 'cr_landpeat', 'road_mills', 'road_town', 'mills_town', 'bobot_road', 'bobot_mills', 'bobot_town', 'cr_accessibility', 'climate_land', 'climate_accessibility', 'land_accessibility', 'bobot_climate', 'bobot_land', 'bobot_accessibility', 'cr_factors'], 'number'],
            [['validation_climate', 'validation_landnpeat', 'validation_landpeat', 'validation_accessibility', 'validation_factors'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Advusr::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'ch_temp' => $this->ch_temp,
            'ch_dm' => $this->ch_dm,
            'temp_dm' => $this->temp_dm,
            'bobot_ch' => $this->bobot_ch,
            'bobot_temp' => $this->bobot_temp,
            'bobot_dm' => $this->bobot_dm,
            'cr_climate' => $this->cr_climate,
            'validation_climate' => $this->validation_climate,
            'slope_text' => $this->slope_text,
            'slope_elev' => $this->slope_elev,
            'text_elev' => $this->text_elev,
            'bobot_slopenp' => $this->bobot_slopenp,
            'bobot_text' => $this->bobot_text,
            'bobot_elev' => $this->bobot_elev,
            'cr_landnpeat' => $this->cr_landnpeat,
            'validation_landnpeat' => $this->validation_landnpeat,
            'slope_thick' => $this->slope_thick,
            'slope_ripe' => $this->slope_ripe,
            'thick_ripe' => $this->thick_ripe,
            'bobot_slopep' => $this->bobot_slopep,
            'bobot_thick' => $this->bobot_thick,
            'bobot_ripe' => $this->bobot_ripe,
            'cr_landpeat' => $this->cr_landpeat,
            'validation_landpeat' => $this->validation_landpeat,
            'road_mills' => $this->road_mills,
            'road_town' => $this->road_town,
            'mills_town' => $this->mills_town,
            'bobot_road' => $this->bobot_road,
            'bobot_mills' => $this->bobot_mills,
            'bobot_town' => $this->bobot_town,
            'cr_accessibility' => $this->cr_accessibility,
            'validation_accessibility' => $this->validation_accessibility,
            'climate_land' => $this->climate_land,
            'climate_accessibility' => $this->climate_accessibility,
            'land_accessibility' => $this->land_accessibility,
            'bobot_climate' => $this->bobot_climate,
            'bobot_land' => $this->bobot_land,
            'bobot_accessibility' => $this->bobot_accessibility,
            'cr_factors' => $this->cr_factors,
            'validation_factors' => $this->validation_factors,
            'id_user' => $this->id_user,
            'dates' => $this->dates,
        ]);

        $query->andFilterWhere(['like', 'skenario', $this->skenario]);

        return $dataProvider;
    }
}
