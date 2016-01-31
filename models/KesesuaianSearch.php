<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kesesuaian;

/**
 * KesesuaianSearch represents the model behind the search form about `app\models\Kesesuaian`.
 */
class KesesuaianSearch extends Kesesuaian
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gid', 'climate_temp', 'climate_dm', 'land_texture', 'land_peat_thickness', 'land_peat_ripening', 'accessibility_distance_from_town', 'constraint_kawasan_hutan', 'constraint_sungai', 'constraint_pemukiman', 'constraint_pipib', 'climate_ch', 'accessibility_distance_from_road', 'accessibility_distance_from_mills', 'land_slope'], 'integer'],
            [['the_geom'], 'safe'],
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
        $query = Kesesuaian::find();

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
            'gid' => $this->gid,
            'climate_temp' => $this->climate_temp,
            'climate_dm' => $this->climate_dm,
            'land_texture' => $this->land_texture,
            'land_peat_thickness' => $this->land_peat_thickness,
            'land_peat_ripening' => $this->land_peat_ripening,
            'accessibility_distance_from_town' => $this->accessibility_distance_from_town,
            'constraint_kawasan_hutan' => $this->constraint_kawasan_hutan,
            'constraint_sungai' => $this->constraint_sungai,
            'constraint_pemukiman' => $this->constraint_pemukiman,
            'constraint_pipib' => $this->constraint_pipib,
            'climate_ch' => $this->climate_ch,
            'accessibility_distance_from_road' => $this->accessibility_distance_from_road,
            'accessibility_distance_from_mills' => $this->accessibility_distance_from_mills,
            'land_slope' => $this->land_slope,
        ]);

        $query->andFilterWhere(['like', 'the_geom', $this->the_geom]);

        return $dataProvider;
    }
}
