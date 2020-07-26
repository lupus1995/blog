<?php

use yii\db\Migration;

/**
 * Class m200721_191504_categoryPost
 */
class m200721_191504_categoryPost extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('idx-post-categoryId', 'posts', 'categoryId');
        $this->addForeignKey(
            'fk-post-categoryId',
            'posts',
            'categoryId',
            'categories',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-post-categoryId', 'posts');
        $this->dropIndex('idx-post-categoryId', 'posts');
    }
}
