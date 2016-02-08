<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Landnpeat;

/**
 * LandnpeatSearch represents the model behind the search form about `app\models\Landnpeat`.
 */
class LandnpeatSearch extends Landnpeat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['slope_text', 'slope_elev', 'text_elev', 'bobot_slope', 'bobot_text', 'bobot_elev', 'cr'], 'number'],
            [['validation'], 'boolean'],
            [['id_user', 'date'], 'safe'],
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
        $query = Landnpeat::find();

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
            'slope_text' => $this->slope_text,
            'slope_elev' => $this->slope_elev,
            'text_elev' => $this->text_elev,
            'bobot_slope' => $this->bobot_slope,
            'bobot_text' => $this->bobot_text,
            'bobot_elev' => $this->bobot_elev,
            'cr' => $this->cr,
            'validation' => $this->validation,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'id_user', $this->id_user]);

        return $dataProvider;
    }
}
