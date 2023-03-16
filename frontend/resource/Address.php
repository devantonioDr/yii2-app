<?php

namespace frontend\resource;

class Address extends \common\models\Address

{

    public function fields()
    {
        return [
            'address_line_1',
            'address_line_2',
            'city',
            'state',
            'country',
            'zip_code',
        ];
    }

}
