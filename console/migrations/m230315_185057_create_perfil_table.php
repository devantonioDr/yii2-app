<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%perfil}}`.
 */
class m230315_185057_create_perfil_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%perfil}}', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer()->notNull(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'date_of_birth' => $this->date(),
            'gender' => $this->string(),
            'description' => $this->text(),
            'created_at' => $this->timestamp()->null(),
            'updated_at' => $this->timestamp()->null()
        ]);
        
        $this->addForeignKey('fk-perfil-user_id', 'perfil', 'client_id', 'client', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-perfil-user_id', 'perfil');

        $this->dropTable('perfil');
    }
}
