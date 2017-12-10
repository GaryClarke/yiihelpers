<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m171204_210450_create_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('order');
    }
}
