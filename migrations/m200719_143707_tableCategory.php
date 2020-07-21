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
            'title' => $this->string(255)->unique(),
            'link' => $this->string(255),
            'parentId' => $this->integer()->defaultValue(null),
            'createdAt' => $this->dateTime(),
            'updatedAt' => $this->dateTime(),
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
