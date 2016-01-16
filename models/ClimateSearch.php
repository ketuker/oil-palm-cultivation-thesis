<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Climate;

/**
 * ClimateSearch represents the model behind the search form about `app\models\Climate`.
 */
class ClimateSearch extends Climate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user'], 'integer'],
            [['ch_temp', 'ch_dm', 'temp_dm', 'bobot_ch', 'boobt_temp', 'bobot_dm', 'cr'], 'number'],
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
        $query = Climate::find();

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
            'boobt_temp' => $this->boobt_temp,
            'bobot_dm' => $this->bobot_dm,
            'cr' => $this->cr,
            'validation' => $this->validation,
            'id_user' => $this->id_user,
            'date' => $this->date,
        ]);

        return $dataProvider;
    }
}
