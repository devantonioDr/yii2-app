<?php

namespace frontend\resource;

class Perfil extends \common\models\Perfil

{

    public function fields()
    {
        return [
            'first_name',
            'last_name',
            'date_of_birth',
            'gender',
            'description',
        ];
    }
}
