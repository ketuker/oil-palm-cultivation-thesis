<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Landpeat;

/**
 * LandpeatSearch represents the model behind the search form about `app\models\Landpeat`.
 */
class LandpeatSearch extends Landpeat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user'], 'integer'],
            [['slope_thick', 'slope_ripe', 'thick_ripe', 'bobot_slope', 'bobot_thick', 'bobot_ripe', 'cr'], 'number'],
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
        $query = Landpeat::find();

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
            'slope_thick' => $this->slope_thick,
            'slope_ripe' => $this->slope_ripe,
            'thick_ripe' => $this->thick_ripe,
            'bobot_slope' => $this->bobot_slope,
            'bobot_thick' => $this->bobot_thick,
            'bobot_ripe' => $this->bobot_ripe,
            'cr' => $this->cr,
            'validation' => $this->validation,
            'id_user' => $this->id_user,
            'date' => $this->date,
        ]);

        return $dataProvider;
    }
}
