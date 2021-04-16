<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%object_task}}`.
 */
class m210416_124130_create_object_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%object_task}}', [
            'object_id' => $this->integer()->notNull(),
            'task_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('FK_object_link', '{{%object_task}}', 'object_id', '{{%object}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_task_link', '{{%object_task}}', 'task_id', '{{%task}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%object_task}}');
    }
}
