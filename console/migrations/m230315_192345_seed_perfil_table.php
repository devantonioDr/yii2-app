<?php

use common\models\Client;
use Faker\Factory;
use yii\db\Migration;
use yii\db\Expression;


/**
 * Class m230315_192345_seed_perfil_table
 */
class m230315_192345_seed_perfil_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        // Get all clients from the client table
        $clients = Client::find()->select(['id'])->column();

        // Create array to hold perfil data
        $perfilData = [];

        // Loop through clients and create perfil data
        $faker = Factory::create('en_US');

        // Gets the current timestamp
        $now = new Expression('NOW()');

        foreach ($clients as $clientId) {
            $gender = $faker->randomElement(['male', 'female']);

            $perfilData[] = [
                $clientId,
                $faker->firstName($gender),
                $faker->lastName,
                $faker->date,
                ucfirst($gender),
                $faker->paragraph,
                $now,
                $now
            ];
        }
        // Insert perfil data into perfil table
        $this->batchInsert('perfil', [
            'client_id',
            'first_name',
            'last_name',
            'date_of_birth',
            'gender',
            'description',
            'created_at',
            'updated_at'
        ], $perfilData);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('perfil');
    }

    /*
// Use up()/down() to run migration code without a transaction.
public function up()
{

}

public function down()
{
echo "m230315_192345_seed_perfil_table cannot be reverted.\n";

return false;
}
 */
}
