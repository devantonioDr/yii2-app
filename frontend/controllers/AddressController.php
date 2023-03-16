<?php

namespace frontend\controllers;

use frontend\resource\Address;
use yii\rest\ActiveController;

class AddressController extends ActiveController
{
    use WithNormalizeResponseTrait;
    public $modelClass = Address::class;
}
