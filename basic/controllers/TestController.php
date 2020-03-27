<?php

namespace app\controllers;

use Yii;
use app\models\PublicOplata;
use app\models\PublicOplataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class TestController extends Controller
{

public $layout='void';
    public function behaviors()
    {

        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $searchModel = new PublicOplataSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//return $this->render('test',['p'=>$p]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTst(){
        $this->layout='void';
        return $this->render('_picker');
    }
    protected function findModel($id)
    {
//        if (($model = PublicOplata::findOne($id)) !== null)
        if (($model = PublicOplata::find()->where(['email' => $_COOKIE['email']])) !== null)
        {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
