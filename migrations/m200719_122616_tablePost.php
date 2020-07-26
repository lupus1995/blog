<?php

use yii\db\Migration;

/**
 * Class m200719_122616_tablePost.
 */
class m200719_122616_tablePost extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'categoryId' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
            'image' => $this->string(255)->notNull(),
            'createdAt' => $this->integer()->notNull(),
            'updatedAt' => $this->integer()->notNull(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('posts');
    }
}
