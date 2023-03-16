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

    
    // public function actionUpdateModels()
    // {
    //     Yii::$app->response->format = Response::FORMAT_JSON;
    //     $post = Yii::$app->request->post();

    //     $model1 = Model1::findOne($post['model1']['id']);
    //     $model2 = Model2::findOne($post['model2']['id']);
    //     $model3 = Model3::findOne($post['model3']['id']);

    //     if (!$model1 || !$model2 || !$model3) {
    //         return ['success' => false, 'message' => 'Models not found.'];
    //     }

    //     $model1->load($post['model1'], '');
    //     $model2->load($post['model2'], '');
    //     $model3->load($post['model3'], '');

    //     $isValid = $model1->validate() && $model2->validate() && $model3->validate();

    //     if ($isValid) {
    //         $transaction = Yii::$app->db->beginTransaction();
    //         try {
    //             $model1->save(false);
    //             $model2->save(false);
    //             $model3->save(false);
    //             $transaction->commit();
    //             return ['success' => true];
    //         } catch (\Exception $e) {
    //             $transaction->rollBack();
    //             return ['success' => false, 'message' => $e->getMessage()];
    //         }
    //     } else {
    //         return ['success' => false, 'message' => 'Validation errors.'];
    //     }
    // }

}
