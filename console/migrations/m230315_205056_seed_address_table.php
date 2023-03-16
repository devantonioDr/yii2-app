<?php

use common\models\Client;
use Faker\Factory;
use yii\db\Migration;
use yii\db\Expression;

/**
 * Class m230315_205056_seed_address_table
 */
class m230315_205056_seed_address_table extends Migration
{
    public function safeUp()
    {
        $faker = Factory::create();

        $clientIds = Client::find()->select(['id'])->column();

        // Gets the current timestamp
        $now = new Expression('NOW()');

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
                $now,
                $now
            ];
        }

        $this->batchInsert('address', [
            'client_id',
            'address_line_1',
            'address_line_2',
            'city',
            'state',
            'country',
            'zip_code',
            'created_at',
            'updated_at'
        ], $data);
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
