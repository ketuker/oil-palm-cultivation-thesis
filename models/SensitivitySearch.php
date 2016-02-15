<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sensitivity;

/**
 * SensitivitySearch represents the model behind the search form about `app\models\Sensitivity`.
 */
class SensitivitySearch extends Sensitivity
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_scenario'], 'integer'],
            [['title', 'description', 'dates', 'data', 'data_rain', 'data_temp', 'data_dm', 'data_slope', 'data_text', 'data_elev', 'data_thick', 'data_ripe', 'data_road', 'data_mills', 'data_town', 'geom'], 'safe'],
            [['st_area'], 'number'],
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
        $query = Sensitivity::find();

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
            'dates' => $this->dates,
            'id_user' => $this->id_user,
            'st_area' => $this->st_area,
            'id_scenario' => $this->id_scenario,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'data', $this->data])
            ->andFilterWhere(['like', 'data_rain', $this->data_rain])
            ->andFilterWhere(['like', 'data_temp', $this->data_temp])
            ->andFilterWhere(['like', 'data_dm', $this->data_dm])
            ->andFilterWhere(['like', 'data_slope', $this->data_slope])
            ->andFilterWhere(['like', 'data_text', $this->data_text])
            ->andFilterWhere(['like', 'data_elev', $this->data_elev])
            ->andFilterWhere(['like', 'data_thick', $this->data_thick])
            ->andFilterWhere(['like', 'data_ripe', $this->data_ripe])
            ->andFilterWhere(['like', 'data_road', $this->data_road])
            ->andFilterWhere(['like', 'data_mills', $this->data_mills])
            ->andFilterWhere(['like', 'data_town', $this->data_town])
            ->andFilterWhere(['like', 'geom', $this->geom]);

        $dataProvider->sort->attributes['skenario'] = [
            'asc' => ['skenario.skenario' => SORT_ASC],
            'desc' => ['skenario.skenario' => SORT_DESC],
        ];

        return $dataProvider;
    }
}
