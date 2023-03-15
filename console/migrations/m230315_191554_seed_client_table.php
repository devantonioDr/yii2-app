<?php

use Faker\Factory;
use yii\db\Migration;
use yii\helpers\Console;

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

        for ($i = 1; $i <= 100; $i++) {
            $client_data[] = [
                $faker->email,
                $faker->phoneNumber(),
                $faker->randomElement([0, 1]),
            ];
        };
        $this->batchInsert('client', ['email', 'phone', 'status'], $client_data);

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
