<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%address}}`.
 */
class m230315_185115_create_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('address', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer()->notNull(),
            'address_line_1' => $this->string()->notNull(),
            'address_line_2' => $this->string(),
            'city' => $this->string()->notNull(),
            'state' => $this->string()->notNull(),
            'country' => $this->string()->notNull(),
            'zip_code' => $this->string()->notNull(),
        ]);

        $this->addForeignKey('fk-address-client_id', 'address', 'client_id', 'client', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-address-client_id', 'address');
        $this->dropTable('address');
    }
}
