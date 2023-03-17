<?php

namespace frontend\resource;

class Client extends \common\models\Client
{

    public function fields()
    {
        return ['id', 'email', 'phone', 'status','address','perfil'];
    }

    public function extraFields()
    {
        return ['address', 'perfil'];
    }
}
