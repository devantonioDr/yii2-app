<?php

namespace frontend\controllers;

use common\traits\WithNormalizeResponseTrait;
use frontend\resource\Client;
use yii\rest\ActiveController;
use yii;
use yii\web\NotFoundHttpException;

use yii\web\HttpException;




class ClientController extends ActiveController
{
    use WithNormalizeResponseTrait;

    public $modelClass = Client::class;

    // public function update($runValidation = true,$attributeNames = null)
    // {
    //     // Get the request data.
    //     $requestData = Yii::$app->request->getBodyParams();

    //     // return ['status' => 'success']; 
    //     // Load the client model.
    //     $client = Client::findOne($requestData['id']);
    //     $client->attributes = $requestData;
        
    //     // Load the address model.
    //     $address = Address::findOne($requestData['address']['id']);
    //     $address->attributes = $requestData['address'];

    //     // Load the perfil model.
    //     $perfil = Perfil::findOne($requestData['perfil']['id']);
    //     $perfil->attributes = $requestData['perfil'];

    //     // Save the models.
    //     $success = $client->save() ;
    //     // && $address->save() && $perfil->save();

    //     // Check if the models were saved successfully.
    //     if ($success) {
    //         return ['status' => 'success'];
    //     } else {
    //         return ['status' => 'error', 'errors' => [$client->errors, $address->errors, $perfil->errors]];
    //     }
    // }

}
