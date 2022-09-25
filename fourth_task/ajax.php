<?php
$link = mysqli_connect("localhost", "root", "", "parse"); 
if(empty($_POST['u3_input']) || empty($_POST['u5_input']) || empty($_POST['u8_input']) || !is_numeric($_POST['u3_input']) || !is_numeric($_POST['u5_input']) || !is_numeric($_POST['u8_input'])) echo 'Проверьте правильность заполнение формы';
else{
    $sql = "SELECT * FROM exceltable where `". $_POST['u1_input'] ."` >= ". $_POST['u3_input'] ." and `". $_POST['u1_input'] ."` <= ". $_POST['u5_input'] ." and (`Наличие на складе 1, шт`+`Наличие на складе 2, шт`)". $_POST['u7_input'] .$_POST['u8_input'];
    echo $sql;
    $data = mysqli_query($link,$sql);
    $text = "<table>";
    $text = $text."<tr><td>id</td><td>Наименование товара</td><td>Стоимость, руб</td><td>Стоимость опт, руб</td><td>Наличие на складе 1, шт</td><td>Наличие на складе 2, шт</td><td>Страна производства</td></tr>";
    while($row = $data->fetch_assoc())
    {
        $text = $text."<tr><td>".$row['id']."</td><td>".$row['Наименование товара']."</td><td>".$row['Стоимость, руб']."</td><td>".$row['Стоимость опт, руб']."</td><td>".$row['Наличие на складе 1, шт']."</td><td>".$row['Наличие на складе 2, шт']."</td><td>".$row['Страна производства']."</td></tr>";
    }
    $text = $text."</table>";
    echo $text;   
}
?>