<?php

use yii\db\Migration;

/**
 * Class m200726_144306_usersTable
 */
class m200726_144306_usersTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'firstName' => $this->string(255)->notNull(),
            'lastName' => $this->string(255)->notNull(),
            'username' => $this->string(255)->notNull(),
            'password' => $this->string(255)->notNull(),
            'authKey' => $this->string(255)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
