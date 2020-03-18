<?php


namespace app\controllers;


use yii\web\Controller;
use Yii;
use app\models\Login;
use app\models\Regg;


class MyController extends Controller
{
    public function actionIndex()
    {
        $this->layout= 'first';
        $model = new Login();
        return $this->render('index',compact('model'));
    }

    public function actionReg()
    {
        $this->layout = 'first';
        $model = new Regg();
        $her =Yii::$app->request->post();




        $s='';
            foreach ($her as $key => $value) {
                if($key=='Regg') {
                    foreach ($value as $key2 => $value2)
                        if($key2=='email'){
$s=$value2;
                        }
                }
            }

    //    return $this->render('test',compact('her'));
        if ($model->load($her)) {
            $cats = Regg::find()->all();
            foreach ($cats as $cat) {
                if ($cat->email === $s) {
                    Yii::$app->session->setFlash('already','Вы уже зарегистрированы');
                    return $this->render('reg', compact('model'));
                }
            }
            if ($model->save(false)) {
                Yii::$app->session->setFlash('nice','Все найс теперь авторизируйтесь');
               return $this->refresh();
            }
        }
////        }
//            if ($model->save(false)) {
//                return $this->refresh();
//            }
//        if ($model->load(Yii::$app->request->post())){
////            $cats = Regg::find()->all();
////            foreach ($cats as $cat) {
//////                if ($cat->email === Yii::$app->request->post()) {
//////                    return Yii::$app->request->post();
//////                }
////            }
//            $jopa =$model->attributes()->email;
//            return $jopa;
//           if( $model->save(false)){
//               return $this->refresh();
//           }
//        }


            return $this->render('reg', compact('model'));

    }
    public function actionTest(){
        $connection = Yii::$app->db;

        return $this->render('test',compact('rows'));

    }

}
