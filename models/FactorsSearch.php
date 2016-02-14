<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Factors;

/**
 * FactorsSearch represents the model behind the search form about `app\models\Factors`.
 */
class FactorsSearch extends Factors
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user'], 'integer'],
            [['climate_land', 'climate_accessibility', 'land_accessibility', 'bobot_climate', 'bobot_land', 'bobot_accessibility', 'cr'], 'number'],
            [['validation'], 'boolean'],
            [['date'], 'safe'],
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
        $query = Factors::find();

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
            'climate_land' => $this->climate_land,
            'climate_accessibility' => $this->climate_accessibility,
            'land_accessibility' => $this->land_accessibility,
            'bobot_climate' => $this->bobot_climate,
            'bobot_land' => $this->bobot_land,
            'bobot_accessibility' => $this->bobot_accessibility,
            'cr' => $this->cr,
            'validation' => $this->validation,
            'id_user' => $this->id_user,
            'date' => $this->date,
        ]);

        return $dataProvider;
    }
}
