<?php

use Faker\Factory;
use yii\db\Migration;
use frontend\models\Client;

/**
 * Class m230315_205056_seed_address_table
 */
class m230315_205056_seed_address_table extends Migration
{
    public function safeUp()
    {
        $faker = Factory::create();

        $clientIds = Client::find()->select(['id'])->column();

        $data = [];
        foreach ($clientIds as $clientId) {
            $data[] = [
                $clientId,
                $faker->streetAddress,
                $faker->secondaryAddress,
                $faker->city,
                $faker->stateAbbr,
                $faker->country,
                $faker->postcode,
            ];
        }

        $this->batchInsert('address', ['client_id', 'address_line_1', 'address_line_2', 'city', 'state', 'country', 'zip_code'], $data);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('address');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230315_205056_seed_address_table cannot be reverted.\n";

        return false;
    }
    */
}
