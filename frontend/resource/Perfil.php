<?php

namespace frontend\resource;

class Perfil extends \common\models\Perfil

{

    public function fields()
    {
        return [
            'id',
            'first_name',
            'last_name',
            'date_of_birth',
            'gender',
            'description',
        ];
    }
}
