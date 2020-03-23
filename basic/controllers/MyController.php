<?php


namespace app\controllers;


use app\models\Oplata;
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
        $this->layout = 'first';
        $model = new Login();
        $her = Yii::$app->request->post();
        $e = '';
        $p = '';
        $b = false;

        foreach ($her as $key => $value) {
            if ($key == 'Login') {
                foreach ($value as $key2 => $value2)
                    if ($key2 == 'email') {
                        $e = $value2;
                    }
                if ($key2 == 'pass') {
                    $p = $value2;
                }
            }
        }
        if ($model->load($her)) {
            $cats = Regg::find()->all();
            foreach ($cats as $cat) {
                if ($cat->email === $e && $cat->pass === $p) {
//                    Yii::$app->session->setFlash('already','Вы уже зарегистрированы');
                    $b = true;
                    $this->layout = 'my';
                    setcookie('bool', $b);
                    setcookie('email', $e);
                    setcookie('fname', $cat->firstname);
                    setcookie('sname', $cat->secondname);
                    setcookie('adr', $cat->address);

                    return $this->render('content', ['b' => $b]); // todo предать масив данных о пользователе или его индекс (лучше индекс но мб заебусь)
                }
            }
            if ($model->save(false)) {
//                Yii::$app->session->setFlash('nice','Все найс теперь авторизируйтесь');
                return $this->refresh();

            }
        }
        return $this->render('index', compact('model'));
    }

    public function actionReg()
    {
        $this->layout = 'first';
        $model = new Regg();
        $her = Yii::$app->request->post();


        $s = '';
        foreach ($her as $key => $value) {
            if ($key == 'Regg') {
                foreach ($value as $key2 => $value2)
                    if ($key2 == 'email') {
                        $s = $value2;
                    }
            }
        }


        if ($model->load($her)) {
            $cats = Regg::find()->all();
            foreach ($cats as $cat) {
                if ($cat->email === $s) {
                    Yii::$app->session->setFlash('already', 'Вы уже зарегистрированы');
                    return $this->render('reg', compact('model'));
                }
            }
            if ($model->save(false)) {
                Yii::$app->session->setFlash('nice', 'Все найс теперь авторизируйтесь');
                return $this->refresh();
            }
        }


        return $this->render('reg', compact('model'));

    }

    public function actionPay()
    {
        $this->layout = 'my';

        $cookies = Yii::$app->request->cookies;
        $model = new CounterForm();
        $post_request = Yii::$app->request->post();
        if ($model->load($post_request)) {
            $p = $post_request['CounterForm'];
            $p = $p['category'];

            $p_name = '';
            switch ($p) {
                case 0:
                    $p_name = 'water';
                    $price = 2;
                    break;
                case 1:
                    $p_name = 'light';
                    $price = 12;
                    break;
                case 2:
                    $p_name = 'gas';
                    $price = 7;
                    break;
                default:
                    $p_name = 'erroe!';
                    break;
            }

            $base = new Oplata();
//            $model->load($her)
//            $base->load(['email' => $_COOKIE['email'], 'category' => $p_name, 'sum' => $model->num * $price, 'time' => date("Y-m-d H:i:s")
//            ]);
            $base->email= $_COOKIE['email'];
            $base->category=$p_name;
            $base->sum= $model->num * $price;
            $base->time=date("Y-m-d H:i:s");
            $base->save();
            $cats = Oplata::find()->all();


//                    Yii::$app->session->setFlash('already','Вы уже зарегистрированы');
            $b = true;
            return $this->render('act', ['num' => $model->num, 'p' => $p]);
        }


        return $this->render('pay', ['b' => $_COOKIE['bool'], 'model' => $model]);


    }

    public function actionContent()
    {
        $this->layout = "my";
        if ($_COOKIE['bool']) {
            return $this->render('content');

        }
        return $this->render('index');
    }
    public  function actionHistory(){
        Oplata::find()->all();

    }
}
