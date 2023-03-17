<?php
namespace common\traits;

use Yii;

// This trait is to make my request respond with a custom format.

trait WithNormalizeResponseTrait
{

    public function serializeData($data)
    {
        $response = [
            'status' => $this->response->statusCode,
            'data' => $data

        ];

        // check if there are any errors
        if ($this->response->statusCode >= 400) {
            $response['message'] = $this->response->statusText;
        }

        return Yii::createObject('yii\rest\Serializer')->serialize($response);
    }
    public function actionDelete($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = MyModel::findOne($id);
        $model->delete();
        return ['success' => true];
    }
    public function afterDelete()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ['status' => $this->response->statusCode];
    }
}
