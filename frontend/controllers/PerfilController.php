<?php

namespace frontend\controllers;

use frontend\resource\Perfil;
use yii\rest\ActiveController;
use common\traits\WithNormalizeResponseTrait;

class PerfilController extends ActiveController
{
    use WithNormalizeResponseTrait;
    public $modelClass = Perfil::class;
}
