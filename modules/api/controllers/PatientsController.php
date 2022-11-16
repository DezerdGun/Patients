<?php

namespace app\modules\api\controllers;


use app\modules\api\models\Patients;
use yii\web\Response;

class PatientsController extends \yii\web\Controller
{

    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        echo 'This is test';

    }

     public function actionCreatePatients()
     {
         \Yii::$app->response->format = Response::FORMAT_JSON;
           $model = new Patients();
           $model->scenario = Patients::SCENARIO_CREATE;
           $model->attributes = \Yii::$app->request->post();
           if ($model->validate()){
               $model->save();
               return array('status' => true,'data' => 'Patients has been created successfully!');
           }else{
               return array('status' => false, 'data' => $model->getErrors());
           }
     }

     public function actionListPatients()
     {
         \Yii::$app->response->format = Response::FORMAT_JSON;
         $model = Patients::find()->all();
         if (count($model) > 0){
             return array('status' => true, 'data' => $model);
         }else{
             return array('status' => false, 'data' => 'No Patients found');
         }
     }
}
