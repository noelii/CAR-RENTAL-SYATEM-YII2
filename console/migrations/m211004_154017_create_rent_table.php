<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rent}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%car}}`
 */
class m211004_154017_create_rent_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rent}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(10),
            'car_id' => $this->string(100)->notNull(),
            'name' => $this->string(100)->notNull(),
            'email' => $this->string(100)->notNull(),
            'order_at' => $this->string()->notNull(),
            'from_date' => $this->string(11)->notNull(),
            'to_date' => $this->string(11)->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-rent-user_id}}',
            '{{%rent}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-rent-user_id}}',
            '{{%rent}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `car_id`
        $this->createIndex(
            '{{%idx-rent-car_id}}',
            '{{%rent}}',
            'car_id'
        );

        // add foreign key for table `{{%car}}`
        $this->addForeignKey(
            '{{%fk-rent-car_id}}',
            '{{%rent}}',
            'car_id',
            '{{%car}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-rent-user_id}}',
            '{{%rent}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-rent-user_id}}',
            '{{%rent}}'
        );

        // drops foreign key for table `{{%car}}`
        $this->dropForeignKey(
            '{{%fk-rent-car_id}}',
            '{{%rent}}'
        );

        // drops index for column `car_id`
        $this->dropIndex(
            '{{%idx-rent-car_id}}',
            '{{%rent}}'
        );

        $this->dropTable('{{%rent}}');
    }
}
