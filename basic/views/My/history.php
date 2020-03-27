

<?php
/* @var $models */
/* @var $pages */

use yii\widgets\LinkPager;
use yii\helpers\Html;
?>
    <ul class="nav nav-pills">
        <li role="presentation" class="action"> <?= Html::a("Главная", ['my/content'])?> </li>
        <li role="presentation" class="action"> <?= Html::a("Оплата", ["my/pay"]) ?> </li>
        <li role="presentation" class="active"> <?= Html::a("История", "") ?> </li>
    </ul>
<br>
<?php


if ($_COOKIE['bool']):?>
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
        <?php  $i=1;
        $w=0;
        $l=0;
        $g=0;

        if($pages->page!=0)
            $i=$_COOKIE['i']*($pages->page+1)*10;
        else $i=1;
        foreach ($models as $model){

            echo "   <tr>
      <th scope='row'>$i</th> "; $i++ ;
            foreach ($model as $key => $value){
//                if($key=='category'){
switch ($value){
    case 'water': $w++;break;
    case 'light': $l++;break;
    case 'gas': $g++;break;
}
                echo "<td> $value  </td>";
            }
            echo " </tr>";

        }


        // отображаем ссылки на страницы
        echo LinkPager::widget([
            'pagination' => $pages,
        ]); ?>
    </table>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['', 'Percentage'],
                ['Water',   <?= $w  ?>],
                ['Light',      <?= $l  ?>],
                ['Gas',   <?= $g  ?>],

            ]);

            var options = {
                title: 'Оплата услуг по категории'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
<?php else:
    $o=<<<HTML
<div onclick="location.href='http://plati/basic/web/'">перейти к авторизации</div>
HTML;

    echo 'Вы не зарегестрированы.<br>'; // todo изменить надпись
    echo $o;

endif;

