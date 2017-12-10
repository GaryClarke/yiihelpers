<?php

use yii\db\Migration;

/**
 * Class m171204_211742_create_category_and_product_tables
 */
class m171204_211742_create_category_and_product_tables extends Migration {

    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%product}}', [
            'id'              => $this->primaryKey(),
            'category_id'     => $this->integer()->notNull(),
            'sub_category_id' => $this->integer()->notNull(),
            'title'           => $this->string()->notNull()
        ], $tableOptions);

        $this->createTable('{{%category}}', [
            'id'          => $this->primaryKey(),
            'category_id' => $this->integer(),
            'title'       => $this->string()->notNull()
        ], $tableOptions);

        $this->addForeignKey('fk_product_category_id', '{{%product}}', 'category_id', '{{%category}}', 'id');
        $this->addForeignKey('fk_product_sub_category_id', '{{%product}}', 'category_id', '{{%category}}', 'id');

        $this->batchInsert('{{%category}}', ['id', 'title'], [
            [1, 'TV, Audio/Video'],
            [2, 'Photo'],
            [3, 'Video']
        ]);

        $this->batchInsert('{{%category}}', ['category_id', 'title'], [
            [1, 'TV'],
            [1, 'Acoustic System'],

            [2, 'Cameras'],
            [2, 'Flashes and Lenses '],
            [3, 'Video Cams'],
            [3, 'Accessories']
        ]);
    }


    public function down()
    {
        $this->dropForeignKey('fk_product_sub_category_id', '{{%product}}');
        $this->dropForeignKey('fk_product_category_id', '{{%product}}');

        $this->dropTable('{{%category}}');
        $this->dropTable('{{%product}}');
    }
}
