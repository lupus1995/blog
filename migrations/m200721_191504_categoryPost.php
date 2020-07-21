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
        $this->createIndex('idx-post-categoryId', 'post', 'categoryId');
        $this->addForeignKey(
            'fk-post-categoryId',
            'post',
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
        $this->dropForeignKey('fk-post-categoryId', 'post');
        $this->dropIndex('idx-post-categoryId', 'post');
    }
}
