<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `post`.
 */
class m171128_214246_create_post_table extends Migration {

    const TABLE_NAME = '{{%post}}';

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql')
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TABLE_NAME, [
            'id'      => Schema::TYPE_PK,
            'title'   => Schema::TYPE_STRING . '(255) NOT NULL',
            'content' => Schema::TYPE_TEXT . ' NOT NULL',
        ], $tableOptions);

        for ($i = 1; $i < 7; $i ++)
        {
            $this->insert(self::TABLE_NAME, [
                'title'   => 'Test Article #' . $i,
                'content' => 'Blah blah blah'
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}
