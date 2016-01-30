<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Accessibility;

/**
 * AccessibilitySearch represents the model behind the search form about `app\models\Accessibility`.
 */
class AccessibilitySearch extends Accessibility
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user'], 'integer'],
            [['road_mills', 'road_town', 'mills_town', 'bobot_road', 'bobot_mills', 'bobot_town', 'cr'], 'number'],
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
        $query = Accessibility::find();

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
            'road_mills' => $this->road_mills,
            'road_town' => $this->road_town,
            'mills_town' => $this->mills_town,
            'bobot_road' => $this->bobot_road,
            'bobot_mills' => $this->bobot_mills,
            'bobot_town' => $this->bobot_town,
            'cr' => $this->cr,
            'validation' => $this->validation,
            'id_user' => $this->id_user,
            'date' => $this->date,
        ]);

        return $dataProvider;
    }
}
