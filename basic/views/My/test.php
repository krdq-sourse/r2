<?php
/* @var $models */
/* @var $pages */

use yii\widgets\LinkPager;
if($_COOKIE['bool']) {
//    print_r($cat);
//    foreach ($s as  $cat){
//    $h--;
////        foreach ($s[$h] as $key => $value){
////            echo "$key => $value  |";
////        }
////        echo "<br>";
////
//////    }

?>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">email</th>
        <th scope="col">Услуга</th>
        <th scope="col">Олачено (в грн.)</th>
        <th scope="col">Дата</th>
    </tr>
    </thead>
    <tbody>


    <?php
if($pages->page!=0)
    $i=$_COOKIE['i']*($pages->page+1)*10;
else $i=1;
    foreach ($models as $model){

   echo "   <tr>
      <th scope='row'>$i</th> "; $i++ ;
            foreach ($model as $key => $value){
//                if($key=='category'){
//switch ($value){
//    case 'water': $w++;break;
//    case 'light': $l++;break;
//    case 'gas': $g++;break;
//}}
                echo "<td> $value  </td>";
            }
            echo " </tr>";

        }


// отображаем ссылки на страницы
    echo LinkPager::widget([
        'pagination' => $pages,
    ]);
}else {
    echo 'посшел нахуй, незареганый!';

}
?>

