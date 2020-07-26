<?php

use yii\db\Migration;

/**
 * Class m200721_192246_tableComments
 */
class m200721_192246_tableComments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'postId' => $this->integer()->notNull(),
            'text' => $this->text(),
        ]);

        $this->createIndex('idx-comments-postId', 'comments', 'postId');
        $this->addForeignKey(
            'fk-comments-postId',
            'comments',
            'postId',
            'posts',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-comments-postId', 'comments');
        $this->dropIndex('idx-comments-postId', 'comments');
        $this->dropTable('comments');
    }
}
