<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%food}}`.
 */
class m240229_093326_create_food_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%food}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'status' => $this->integer()->defaultValue(0), // You might adjust this based on your needs
        ]);

        $this->createTable('{{%food_ingredients}}', [
            'food_id' => $this->integer(),
            'ingredient_id' => $this->integer(),
        ]);

        // Add foreign key constraint
        $this->addForeignKey(
            'fk-food_ingredients-food_id',
            'food_ingredients',
            'food_id',
            'food',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-food_ingredients-ingredient_id',
            'food_ingredients',
            'ingredient_id',
            'ingredients',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop the foreign key first
        $this->dropForeignKey('fk-food_ingredients-food_id', 'food_ingredients');
        $this->dropForeignKey('fk-food_ingredients-ingredient_id', 'food_ingredients');

        // Drop the junction table
        $this->dropTable('{{%food_ingredients}}');

        // Drop the food table
        $this->dropTable('{{%food}}');
    }
}
