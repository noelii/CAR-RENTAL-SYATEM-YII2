<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%backup}}`.
 */
class m210923_184423_create_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car}}', [
            'id' => $this->string(),
            'car_model' => $this->string(100),
            'car_name' => $this->string(100),
            'car_price' => $this->integer(10),
            'car_type' => $this->string(100),
            'car_status' => $this->string(16),
            'from_date' => $this->string(),
            'to_date' => $this->string(),
        ]);

        $this->addPrimaryKey('PK_car_id', '{{%car}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car}}');
    }
}
