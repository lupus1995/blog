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
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
            'image' => $this->string(255),
            'createdAt' => $this->dateTime(),
            'updatedAt' => $this->dateTime(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('post');
    }
}
