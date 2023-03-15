<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%client}}".
 *
 * @property int $id
 * @property string $email
 * @property string|null $phone
 * @property int $status
 *
 * @property Address[] $addresses
 * @property Perfil[] $perfils
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%client}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'status'], 'required'],
            [['status'], 'integer'],
            [['email', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'phone' => 'Phone',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Addresses]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AddressQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::class, ['client_id' => 'id']);
    }

    /**
     * Gets query for [[Perfils]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PerfilQuery
     */
    public function getPerfils()
    {
        return $this->hasMany(Perfil::class, ['client_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ClientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ClientQuery(get_called_class());
    }
}