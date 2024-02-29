<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Food;

/**
 * FoodSearch represents the model behind the search form of `common\models\Food`.
 */
class FoodSearch extends Food
{
    public $ingredientIds;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {

        return [
            [['id', 'status'], 'integer'],
            [['name', 'ingredientIds'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Food::find()->joinWith('foodIngredients.ingredient');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // Filter by multiple ingredient IDs
        if (!empty($this->ingredientIds)) {
            $query->joinWith('foodIngredients')
                ->joinWith('foodIngredients.ingredient')
                ->andFilterWhere(['in', 'ingredients.id', $this->ingredientIds]);
        }

        // Add other filtering conditions
        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['status' => $this->status]);
        $query->andFilterWhere(['ilike', 'name', $this->name]);

        return $dataProvider;
    }
}
