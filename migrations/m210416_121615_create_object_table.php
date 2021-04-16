<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%object}}`.
 */
class m210416_121615_create_object_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%object}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'image' => $this->string(255),
            'parent_id' => $this->integer(11),
        ]);

        $this->addForeignKey('FK_parent', '{{%object}}', 'parent_id', '{{%object}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%object}}');
    }
}
