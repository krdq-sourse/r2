<?php


namespace app\controllers;


use yii\web\Controller;
use Yii;
use app\models\Login;
use app\models\Regg;
use function foo\func;
use app\models\CounterForm;

class MyController extends Controller
{

    public function actionIndex()
    {
        $this->layout= 'first';
        $model = new Login();
        $her =Yii::$app->request->post();
        $e=''; $p='';
        $b=false;

        foreach ($her as $key => $value) {
            if($key=='Login') {
                foreach ($value as $key2 => $value2)
                    if ($key2 == 'email') {
                        $e = $value2;
                    }
                if ($key2 == 'pass') {
                    $p = $value2;
                }
            } }
        if ($model->load($her)) {
            $cats = Regg::find()->all();
            foreach ($cats as $cat) {
                if ($cat->email === $e&&$cat->pass===$p) {
//                    Yii::$app->session->setFlash('already','Вы уже зарегистрированы');
                    $b=true;
                    $this->layout = 'my';
       setcookie('bool',$b);
       setcookie('email',$e);
       setcookie('fname',$cat->firstname);
       setcookie('sname',$cat->secondname);
       setcookie('adr',$cat->address);

                    return $this->render('content', ['b'=>$b]); // todo предать масив данных о пользователе или его индекс (лучше индекс но мб заебусь)
                }
            }
            if ($model->save(false)) {
//                Yii::$app->session->setFlash('nice','Все найс теперь авторизируйтесь');
                    return $this->refresh();

            }
        }
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

public function actionPay(){
    $this->layout = 'my';

    $cookies = Yii::$app->request->cookies;
    $model= new CounterForm();
if($model->load(Yii::$app->request->post())){

        return $this->render('act',['num'=>$model->num]);

}

       return $this->render('pay',['b'=>$_COOKIE['bool'],'model'=>$model]);


        }
}

