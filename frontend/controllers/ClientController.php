<?php

namespace frontend\controllers;


use Yii;
use yii\web\Controller;
use yii\web\Response;
use frontend\models\Client;


class ClientController extends Controller

{
    public $urlManager = 'clientUrlManager';
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $clients = Client::find()->all();

        return $clients;
    }

    public function actionCreate()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $client = new Client();

        if ($client->load(Yii::$app->request->post()) && $client->validate()) {
            $client->save();
            return ['success' => true, 'data' => $client];
        } else {
            return ['success' => false, 'errors' => $client->errors];
        }
    }

    public function actionUpdate($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $client = Client::findOne($id);

        if (!$client) {
            return ['success' => false, 'message' => 'Client not found'];
        }

        if ($client->load(Yii::$app->request->post()) && $client->validate()) {
            $client->save();
            return ['success' => true, 'data' => $client];
        } else {
            return ['success' => false, 'errors' => $client->errors];
        }
    }

    public function actionDelete($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $client = Client::findOne($id);

        if (!$client) {
            return ['success' => false, 'message' => 'Client not found'];
        }

        $client->delete();
        return ['success' => true];
    }

}
