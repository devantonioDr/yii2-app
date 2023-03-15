<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%perfil}}".
 *
 * @property int $id
 * @property int $client_id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $date_of_birth
 * @property string|null $gender
 * @property string|null $description
 *
 * @property Client $client
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%perfil}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'first_name', 'last_name'], 'required'],
            [['client_id'], 'integer'],
            [['date_of_birth'], 'safe'],
            [['description'], 'string'],
            [['first_name', 'last_name', 'gender'], 'string', 'max' => 255],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::class, 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'date_of_birth' => 'Date Of Birth',
            'gender' => 'Gender',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ClientQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::class, ['id' => 'client_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\PerfilQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PerfilQuery(get_called_class());
    }
}
