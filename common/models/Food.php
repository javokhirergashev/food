<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "food".
 *
 * @property int $id
 * @property string $name
 * @property int|null $status
 *
 * @property FoodIngredients[] $foodIngredients
 */
class Food extends \yii\db\ActiveRecord
{
    public $ingredientIds;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'food';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'default', 'value' => null],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['ingredientIds'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Taom nomi',
            'status' => 'Status',
            'ingredientIds' => 'Masalliqlar'
        ];
    }

    /**
     * Gets query for [[FoodIngredients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFoodIngredients()
    {
        return $this->hasMany(FoodIngredients::class, ['food_id' => 'id']);
    }
}
