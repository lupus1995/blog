<?php

use yii\db\Migration;

/**
 * Class m200719_143707_tableCategory.
 */
class m200719_143707_tableCategory extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->unique()->notNull(),
            'slug' => $this->string(255)->notNull(),
            'parentId' => $this->integer()->defaultValue(null),
            'createdAt' => $this->integer()->notNull(),
            'updatedAt' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('categories');
    }
}
