<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client}}`.
 */
class m230315_185016_create_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $now = Yii::$app->formatter->asTimestamp('now');

        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull(),
            'phone' => $this->string()->null(),
            'status' => $this->integer()->notNull(),
            // 'address_id'=> $this->integer()->null(),
            // 'perfil_id'=> $this->integer()->null(),
            'created_at' => $this->timestamp()->null(),
            'updated_at' => $this->timestamp()->null(),
            
        ]);

        // $this->addForeignKey('fk-perfil-client', 'perfil', 'client_id', 'client', 'perfil_id', 'CASCADE', 'CASCADE');
        // $this->addForeignKey('fk-address-client', 'address', 'client_id', 'client', 'address_id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%client}}');
    }
}
