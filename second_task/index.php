<?php
require_once "PHPExcel.php";

$link = mysqli_connect("localhost", "root", "", "parse"); // Подключение к бд

$excel = PHPExcel_IOFactory::load('./pricelist.xls'); // Excel файл

foreach($excel -> getWorksheetIterator() as $worksheet) { //Импорт Excel в Mysql
  $lists[] = $worksheet -> toArray();
}

mysqli_query($link, "DROP TABLE IF EXISTS exceltable");

$i = 0;
$j = 0;
foreach($lists as $list){
  if($j==0){
    $j++;
  foreach($list as $row){
    $i++;
    foreach($row as $col){
      if(!empty($col) && $i == 1) {
        $columns_str = $columns_str.'`'.$col.'`'.'.';
        $columns_str2 = substr($columns_str, 0, -1);
      }
      if(!empty($col) && $i != 1){
        $value_str = $value_str."'".$col."',";
      }
    }
    if($i == 1){
      $sql = "CREATE TABLE exceltable (id INT UNSIGNED NOT NULL AUTO_INCREMENT," . str_replace(".", " TEXT NOT NULL,", $columns_str) . " PRIMARY KEY(id))";
      $result = mysqli_query($link, $sql);
    }
    else{
      $value_str = substr($value_str, 0, -1);
      $columns_str2 = str_replace('.', ',', $columns_str2); 
      mysqli_query($link, "INSERT INTO exceltable (" . $columns_str2 . ") VALUES (" . $value_str . ")");
      $value_str = "";
    }
  }
}
}
//Определение максимального и минимального
$sql = "SELECT `Стоимость, руб` as max, `Стоимость опт, руб` as min FROM `exceltable` where `Стоимость, руб`<>'Стоимость' and `Стоимость опт, руб` <> '#VALUE!'";
$data = mysqli_query($link,$sql);
$max = 0;
$min = 0;
$i = 0;
while($row = $data->fetch_assoc())
{
    if($min===0) $min = (float)$row['min'];
    if((float)$row['max'] > $max)
      $max = (float)$row['max'];
    if((float)$row['min'] < $min)
      $min = (float)$row['min'];
}
//Запрос на вывод таблицы
$sql = "SELECT * FROM exceltable";
$data = mysqli_query($link,$sql);
display_data($data, $max, $min);

function display_data($data, $max, $min) { //Функция вывода таблицы
  $output = '<table>';
  foreach($data as $key => $var) {
      if ($key === 0) {
        $output .= '<tr>';
        foreach($var as $k => $v) {
          $output .= '<td><strong>' . $k . '</strong></td>';
        } 
        $output .= '<td><strong>Примечание</strong></td>';
      }
      $output .= '</tr>';
  }
  foreach($data as $key => $var) {
    $output .= '<tr>';
    foreach($var as $k => $v) {
      if($k == 'Наличие на складе 1, шт' && (int)$v < 20){
        $text = "Осталось мало! Срочно докупить!!!";
      }
      else if($k == 'Наличие на складе 2, шт' && (int)$v < 20){
        $text = "Осталось мало! Срочно докупить!!!";
      }
      if($k == 'Стоимость, руб' && (float)$v == $max && $v != 'Стоимость')
        $output .= '<td style="background-color: red;">' . $v . '</td>';
      else if($k == 'Стоимость опт, руб' && (float)$v == $min && $v != '#VALUE!')
        $output .= '<td style="background-color: green;">' . $v . '</td>';
      else $output .= '<td>' . $v . '</td>';
    }
    $output .= "<td>$text</td></tr>";
    $text = '';
  }
  $output .= '</table>';
  echo $output;
  echo '<br><hr>';
}

/* ----------------*/
/* Запросы на выполнения заданий */
$sql = "SELECT SUM(`Наличие на складе 1, шт`) + SUM(`Наличие на складе 2, шт`) as sum FROM `exceltable`";
$data = mysqli_query($link,$sql);
while($row = $data->fetch_assoc())
{
    echo 'Общее кол-во товаров на Складах: '.$row['sum'].'<br><hr>';
}

$sql = "SELECT AVG(`Стоимость, руб`) as avg1, AVG(`Стоимость опт, руб`) as avg2 FROM `exceltable`";
$data = mysqli_query($link,$sql);
while($row = $data->fetch_assoc())
{
    echo 'Средняя стоимость рознечной цены товаров: '.$row['avg1'].'<br><hr>';
    echo 'Средняя стоимость оптовой цены товаров: '.$row['avg2'].'<br><hr>';
}
