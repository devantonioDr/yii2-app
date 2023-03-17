<?php

use Faker\Factory;
use yii\db\Migration;
use yii\helpers\Console;
use yii\db\Expression;


/**
 * Class m230315_191554_seed_client_table
 */
class m230315_191554_seed_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $faker = Factory::create('en_US');

        Console::startProgress(0, 100, 'Seeding client table: ');

        $client_data = [];

        
        // Gets the current timestamp
        $now = new Expression('NOW()');

        for ($i = 1; $i <= 19; $i++) {
            $client_data[] = [
                $faker->email,
                $faker->phoneNumber(),
                $faker->randomElement([0, 1]),
                $now,
                $now
            ];
        };
        $this->batchInsert('client', [
            'email', 
            'phone', 
            'status',
            'created_at',
            'updated_at'
        ], $client_data);

        Console::endProgress(true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('client', []);
    }

    /*
// Use up()/down() to run migration code without a transaction.
public function up()
{

}

public function down()
{
echo "m230315_191554_seed_client_table cannot be reverted.\n";

return false;
}
 */
}
