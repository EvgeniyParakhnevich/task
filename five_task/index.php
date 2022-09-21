<?php
    $link = mysqli_connect("localhost", "root", "", "php1");
    $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $parts = parse_url($url); 
    parse_str($parts['query'], $query); 
    cookie($query['page']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Тестовое задание Webcompany</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery-1.1.3.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="js/jquery.lavalamp.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $("#1, #2, #3").lavaLamp({
                    fx: "backout",
                    speed: 700,
                    click: function (event, menuItem) {
                        return true;
                    }
                });
            });
        </script>
        <link href="lavalamp.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="wrap">
            <div id="topbg"> </div>
            <div id="wrap2">
                <div id="topbar">
                    <img style="float:left;margin:0 150px 0 20px;height:65px;" src="images/logo.svg" alt="logo"> 
                        <h1 id="sitename"><a href="#">Тестовое задание</a> <span class="description"></span></h1>
                </div>
                <div id="header">
                    <div id="headercontent"> </div>
                    <div id="topnav">
                        <ul class="lavaLampWithImage" id="1">
                            <li class='current' ><a href="?page=1">Города</a></li>
                            <li  ><a href="?page=2">Пользователи</a></li>
                            <li  ><a href="?page=3">Поиск</a></li>
                        </ul>
                    </div>
                </div>
                <div id="content">
                    <div id="left">   
                        <div class="post">
                            <div class="postheader"> </div>
                            <div class="postcontent"> 
                                <h2>Общее количество загрузок страницы = <b><?php echo $_COOKIE["count"]; ?></b></h2>
                            </div>
                            <div class="postbottom">
                                <h3 style=" margin-left: 25px; ">Вы посещали эту страницу <b>
                                        <?php echo $_COOKIE["page"][$query['page']]; ?>                                    </b> раз</h3>
                            </div>
                        </div>
                        <div class="post">
    <?php
        if($query['page'] == '' || $query['page'] == 1) page1($query['page'], $link);
        if($query['page'] == 2) page2($query['page'], $link);
        if($query['page'] == 3) page3($query['page'], $link);
    ?>
    
</div> 
</div>
                    <div id="sidebar">
                        <h3> <b>Слева рабочая модель.</b></h3>
                        <h3>Описание тестового задания</h3>
                        <div class='zadanie'>
                            <h4>Общее для всех страниц</h4>
                            <ul>
                                <ol>1 Общий счетчик на сайт</ol>
                                <ol>2 Счетчик на каждую страницу</ol>
                            </ul>
                            <h4>Страница города</h4>
                            <ul>
                                <ol>1 Вывод всех городов</ol>
                                <ol>2 Добавление</ol>
                                <ol>3 Удаление</ol>
                                <ol>4 Редактирование</ol>
                                <ol><b>5 Сортировка</b></ol>
                                <ol>5.1 Выбор направления</ol>
                                <ol>5.2 Выбор поля</ol>
                            </ul>
                            <h4>Страница Пользователи</h4>
                            <ul>
                                <ol>1 Вывод всех Пользователей</ol>
                                <ol>2 Добавление</ol>
                                <ol>3 Удаление</ol>
                                <ol>4 Редактирование</ol>
                                <ol><b>5 Сортировка</b></ol>
                                <ol>5.1 Выбор направления</ol>
                                <ol>5.2 Выбор поля</ol>
                                <ol>6 Фильтр по городам</ol>
                            </ul>
                            <h4>Страница Поиск</h4>
                            <ul>
                                <ol>1 Форма поиска</ol>
                                <ol>2 Поиск по фамилии</ol>
                                <ol>3 Поиск по имени</ol>
                                <ol>4 Вывод результатов</ol>
                            </ul>
                            <h3>Описание связей</h3>
                            <p>
                                Если изменяем название города Орша На Орша1 
                                то у всех пользователей которые были выбрали Орша 
                                Станет так-же Орша1 и во всех списках выбора города будет уже Орша1
                            </p>
                            <h3>Требование при выполнении</h3>
                            <p>
                                <h4>Не использовать фреймворки!!!</h4>
                                <h4>Использовать разбитие кода на функции</h4>
                                <h4>Понятные названия переменных</h4>
                                <h4>Язык прогроммирования серверной части PHP</h4>
                                <h4>Использование $_COOKIE для счетчиков</h4>
                            </p>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div id="footer"> 
                    <div class="credit">Webcompany 2022г</div>
                </div>
            </div>
            <div id="btmbg"> </div>
        </div>
    </body>
</html>

<?php
    function cookie($query){
        if(!isset($_COOKIE["count"])) setcookie("count", 1); 
        else setcookie("count", $_COOKIE["count"] + 1); 
        if(!isset($_COOKIE["page"][1])) setcookie("page[1]", 1); 
        else if($query==1) setcookie("page[1]", $_COOKIE["page"][1] + 1); 
        if(!isset($_COOKIE["page"][2])) setcookie("page[2]", 1); 
        else if($query==2) setcookie("page[2]", $_COOKIE["page"][2] + 1); 
        if(!isset($_COOKIE["page"][3])) setcookie("page[3]", 1); 
        else if($query==3) setcookie("page[3]", $_COOKIE["page"][3] + 1); 
    }
    function page1($query, $link){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['subminscity'])){
            mysqli_query($link, "INSERT INTO `city`(`name`, `index_sort`) VALUES ('".$_POST['instextcity']."','".$_POST['instextrangir']."')");
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['del_fors_city'])){
            mysqli_query($link, "DELETE FROM `city` WHERE `id_city`=".$_POST['id']);
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_edit_city'])){
            mysqli_query($link, "UPDATE `city` SET `name`='".$_POST['edit_text_city']."',`index_sort`='".$_POST['edit_text_rangir']."' WHERE `id_city`=".$_POST['id']);
        }
        if( isset($_POST['sort'])){
        ?>
            <form action="" method="post">
                <div class="sortform">
                    <div class="pole">
                        <h3>Поле сортировки</h3>
                        <span>
                            <input type="radio" name="sort_sity" value="id_city" checked="">
                            <b>id</b>
                        </span>
                        <span>
                            <input type="radio" name="sort_sity" value="name">
                            <b>Название Города</b>
                        </span>
                        <span>
                            <input type="radio" name="sort_sity" value="index_sort">
                            <b>Индекс Сортировки</b>
                        </span>
                    </div>
                    <div class="napr">
                        <h3>Направление сортировки</h3>
                        <span>
                            <input type="radio" name="sort_order_by" value="asc" checked="">
                            <b>Возрастание</b>
                        </span>
                        <span>
                            <input type="radio" name="sort_order_by" value="desc">
                            <b>Убывание</b>
                        </span>	
                    </div>
                    <input type="submit" name="submit_sort_city" value="Сортировать">
                    <a href="/?page=1">Отмена</a>
                </div>

            </form> 
        <?php
        }
    if(($_SERVER['REQUEST_METHOD'] != 'POST' || (!isset($_POST['ins']) && !isset($_POST['edit_fors_city'])))) {
        ?>
        <div class="postheader"> </div>
        <div class="postcontent"> 
        <h2>Список городов</h2>    
        <!--вывод таблицы Города-->
            <form action="" method="post"   >
                <div class="form flrig">
                    <input type="submit" name="ins" value="Добавить" >
                    <input type="submit" name="sort" value="Сортировать" >
                </div>
            </form>	
        <?php
                if(isset($_POST['submit_sort_city']))
                    $sql = "SELECT * FROM `city` ORDER BY ".$_POST['sort_sity']." ".$_POST['sort_order_by'];
                else
                    $sql = "SELECT * FROM `city`";
                $data = mysqli_query($link,$sql);
                while($row = $data->fetch_assoc())
                {
        ?>
          <div class="cpsity">
                    <h3><?php echo $row['name']; ?></h3>
                    <span>
                        <form action="" method="post" >
                            <input type="hidden" name="id" value="<?php echo $row['id_city']; ?>" >
                            <input type="submit" name="del_fors_city" onclick="return confirm('Вы действительно хотите удалить город?')" value="Удалить" >
                        </form>	
                    </span>
                    <span>
                        <form action="" method="post" >
                            <input type="hidden" name="id" value="<?php echo $row['id_city']; ?>" >
                            <input type="submit" name="edit_fors_city" value="Редактировать" >
                        </form>
                    </span>
                </div>
        <?php
                } 
        ?>
            </div>
            <div class="postbottom"></div>
        <?php
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['subminscity']) && isset($_POST['ins'])){
        ?>

    <div class="post">
    <div class="postheader"> </div>
    <div class="postcontent"> 
        <h2>Список городов</h2>               
        <!--вывод таблицы Города-->
            <form action="" method="post" class="dopsity">
                <h3>Форма добовления города</h3>
                <input type="text" name="instextcity" required="" placeholder="Название города">
                <input type="text" name="instextrangir" required="" placeholder="Индекс Сортировки">
                <br>
                <input type="submit" value="Добавить" name="subminscity"> 
                <a href="/?page=1">Отмена</a>	
            </form>

                </div>
        <div class="postbottom">
        </div>
    </div>
    <?php
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['subminscity']) && !isset($_POST['ins']) && isset($_POST['edit_fors_city'])){
            $sql = "SELECT * FROM `city` WHERE id_city=".$_POST['id'];
            $data = mysqli_query($link,$sql);
            while($row = $data->fetch_assoc())
            {
    ?>
    <div class="post">
        <div class="postheader"> </div>
        <div class="postcontent"> 
            <h2>Список городов</h2>               
            <form action="" method="post">
                <div class="form">
                    <h3>Форма редактирования города</h3>
                    <span>Название:<input type="text" name="edit_text_city" required="" value="<?php echo $row['name']; ?>"></span>
                    <span>Индекс Сортировки:<input type="text" name="edit_text_rangir" required="" value="<?php echo $row['index_sort']; ?>"></span>
                    <input type="hidden" name="id" value="<?php echo $row['id_city']; ?>">
                    <input type="submit" name="submit_edit_city" value="Подтвердить редактирование">
                    <a href="/?page=1">Отмена</a>	 
                </div>	
            </form>
        </div>
        <div class="postbottom">
        </div>
    </div>
    <?php
            }
        }
    }

    function page2($query, $link){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['del_fors_names']))
                mysqli_query($link, "DELETE FROM `users` WHERE `id_users`=".$_POST['id']);
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['subm_edit_names'])){
                $dest_path = '';
                if (isset($_FILES['uploadfile']) && $_FILES['uploadfile']['error'] === UPLOAD_ERR_OK) {
                    $fileTmpPath = $_FILES['uploadfile']['tmp_name'];
                    $fileName = $_FILES['uploadfile']['name'];
                    $fileSize = $_FILES['uploadfile']['size'];
                    $fileType = $_FILES['uploadfile']['type'];
                    $fileNameCmps = explode(".", $fileName);
                    $fileExtension = strtolower(end($fileNameCmps));
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                    $uploadFileDir = './pictures/';
                    $dest_path = $uploadFileDir . $newFileName;
                    move_uploaded_file($fileTmpPath, $dest_path);
                }
                mysqli_query($link, "UPDATE `users` SET `id_city`='".$_POST['edit_selsity']."',`img`='".$dest_path."',`name`='".$_POST['edit_text_name']."',`surname`='".$_POST['edit_text_surname']."' WHERE `id_users`=".$_POST['id_red']);
            }
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['subm_ins_names'])){
                $dest_path = '';
                if (isset($_FILES['uploadfile']) && $_FILES['uploadfile']['error'] === UPLOAD_ERR_OK) {
                    $fileTmpPath = $_FILES['uploadfile']['tmp_name'];
                    $fileName = $_FILES['uploadfile']['name'];
                    $fileSize = $_FILES['uploadfile']['size'];
                    $fileType = $_FILES['uploadfile']['type'];
                    $fileNameCmps = explode(".", $fileName);
                    $fileExtension = strtolower(end($fileNameCmps));
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                    $uploadFileDir = './pictures/';
                    $dest_path = $uploadFileDir . $newFileName;
                    move_uploaded_file($fileTmpPath, $dest_path);
                }
                mysqli_query($link, "INSERT INTO `users`(`id_city`, `img`, `name`, `surname`) VALUES ('".$_POST['selsity']."','".$dest_path."','".$_POST['ins_name']."','".$_POST['ins_surname']."')");
            }
            if(isset($_POST['ins2'])) {
    ?>
        <div class="post">
            <div class="postheader"> </div>
            <div class="postcontent"> 
                <h2>Список Пользователей</h2> 
                <p><a name="top"></a></p>
                        <!--Сортирвка-->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form">
                            <h3>Форма Добовления Пользователя</h3>
                            <input type="text" name="ins_name" required="" placeholder="Имя">
                            <input type="text" name="ins_surname" required="" placeholder="Фамилия">
                            <span>город: 
                                <select size="1" name="selsity">
                                    <option disabled="">Выберите город</option>
                                    <?php
                                        $sql = "SELECT * FROM `city`";
                                        $data = mysqli_query($link,$sql);
                                        while($row = $data->fetch_assoc())
                                        {
                                    ?>
                                            <option value="<?php echo $row['id_city']; ?>"><?php echo $row['name']; ?></option>
                                    <?php
                                        }
                                    ?>
                                                                </select></span>
                            <p>Выберите файл изображения</p>
                            <input type="file" name="uploadfile">

                            <input type="submit" name="subm_ins_names" value="Добавить">
                            <a href="/?page=2">Отмена</a> 
                        </div>
                    </form>
                        </div>
            <div class="postbottom">
            </div>
        </div>
    <?php
            }
            else if(isset($_POST['edit_fors_names'])){
                $sql = "SELECT * FROM `users` WHERE users.id_users=".$_POST['id15'];
                $data = mysqli_query($link,$sql);
                while($row = $data->fetch_assoc())
                {
    ?>
        <div class="postcontent"> 
            <h2>Список Пользователей</h2> 
            <p><a name="top"></a></p>
                        <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form">
                        <h3>Форма Редактирования Пользователя</h3>
                        <span>Имя <input type="text" name="edit_text_name" required="" value="<?php echo $row['name']; ?>"> </span>
                        <span>Фамилия <input type="text" name="edit_text_surname" required="" value="<?php echo $row['surname']; ?>"> </span>
                        <span>Город 
                            <select size="1" name="edit_selsity">
                                <option disabled="">Выберите город</option>
                                <?php
                                        $sql1 = "SELECT * FROM `city`";
                                        $data1 = mysqli_query($link,$sql1);
                                        while($row1 = $data1->fetch_assoc())
                                        {
                                    ?>
                                            <option value="<?php echo $row1['id_city']; ?>"><?php echo $row1['name']; ?></option>
                                    <?php
                                        }
                                    ?>
                                                                </select></span>
                        <img width="100" src="<?php echo $row['img']; ?>" class="image" alt="Фотография">
                        <input type="file" name="uploadfile">
                        <input type="hidden" name="photo" value="<?php echo $row['name']; ?>">
                        <input type="hidden" name="id_red" value="<?php echo $row['id_users']; ?>">
                        <input type="submit" name="subm_edit_names" value="Подтвердить редактирование"> 
                        <a href="/?page=2">Отмена</a>
                    </div>
                </form>
            <!--Сортирвка-->
        </div>
        <div class="postbottom"></div>
    <?php
                }
            }
            else{
    ?>
            <div class="post">
                <div class="postheader"> </div>
                <div class="postcontent"> 
                    <h2>Список Пользователей</h2> 
                    <?php 
                        if(isset($_POST['sort2'])){
                    ?>
                        <form action="" method="post">
                            <div class="sortform">
                                <div class="pole">
                                    <h3>Поле сортировки</h3>
                                    <span>
                                        <input type="radio" name="sort_name" value="id_users" checked="">
                                        <b>id</b>
                                    </span>
                                    <span>
                                        <input type="radio" name="sort_name" value="name" checked="">
                                        <b>Имя</b>
                                    </span>
                                    <span>
                                        <input type="radio" name="sort_name" value="surname" checked="">
                                        <b>Фамилия</b>
                                    </span>
                                    <span>
                                        <input type="radio" name="sort_name" value="city" checked="">
                                        <b>Городу</b>
                                    </span>
                                </div>
                                <div class="napr">
                                    <h3>Направление сортировки</h3>
                                    <span>
                                        <input type="radio" name="sort_order_by_2" value="asc" checked="">
                                        <b>Возрастание</b>
                                    </span>
                                    <span>
                                        <input type="radio" name="sort_order_by_2" value="desc">
                                        <b>Убывание</b>
                                    </span>	
                                </div>
                                <input type="submit" name="submit_sort_names" value="Сортировать">
                                <a href="/?page=2">Отмена</a>
                            </div>
                        </form>
                    <?php
                        }
                    ?>
                    <p><a name="top"></a></p>
                            <!--Сортирвка-->
                                        <h3><a href="#down">Вниз</a></h3>
                        <div style="display:inline-block">
                            <form action="" method="post">
                                <input type="submit" name="ins2" value="Добавить">
                                <input type="submit" name="sort2" value="Сортировать">
                            </form>	
                        </div>
                        <!--Создадим выпадающий список "Города"-->
                        <div class="filter">
                            <form action="" method="post">
                                <h3>Фильтр по Городам</h3>
                                <select size="1" name="selsity_2">
                                    <option disabled="">Выберите город</option>
                                    <?php
                                        $sql = "SELECT * FROM `city`";
                                        $data = mysqli_query($link,$sql);
                                        while($row = $data->fetch_assoc())
                                        {
                                    ?>
                                            <option value="<?php echo $row['id_city']; ?>"><?php echo $row['name']; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <input type="submit" name="sort_fc" onclick="hhh()" value="Показать">
                            </form>
                        </div>
                        <?php
                            if(isset($_POST['submit_sort_names']))
                                $sql = "SELECT users.id_users as id_users, users.img as img, users.name as name, users.surname as surname, city.name as city FROM `users`,city WHERE city.id_city=users.id_city ORDER BY ".$_POST['sort_name']." ".$_POST['sort_order_by_2'];
                            else if(isset($_POST['sort_fc'])){
                                $sql = "SELECT users.id_users as id_users, users.img as img, users.name as name, users.surname as surname, city.name as city, city.id_city as id_city FROM `users`,city WHERE city.id_city=users.id_city and city.id_city=".$_POST['selsity_2'];
                            }
                            else
                                $sql = "SELECT users.id_users as id_users, users.img as img, users.name as name, users.surname as surname, city.name as city FROM `users`,city WHERE city.id_city=users.id_city";
                            $data = mysqli_query($link,$sql);
                            while($row = $data->fetch_assoc())
                            {
                        ?>
                            <div class="users">
                                <img width="100" src="<?php echo $row['img']; ?>" class="image" alt="Фотография">
                                <div class="userdan">
                                    <h4><?php echo $row['name'].' '.$row['surname']; ?></h4>
                                    <p>Город: <?php echo $row['city']; ?></p>
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['id_users']; ?>">
                                        <input type="submit" name="del_fors_names" value="Удалить" onclick="return confirm('Вы действительно хотите удалить пользователя?')">
                                    </form>	

                                    <form action="" method="post">
                                        <input type="hidden" name="id15" value="<?php echo $row['id_users']; ?>">
                                        <input type="submit" name="edit_fors_names" value="Редактировать">
                                    </form>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                        <a name="down"></a>
                        <h3><a href="#top">Наверх</a></h3>    </div>
                <div class="postbottom">
                </div>
            </div>
    <?php
            }
    }
    function page3($query, $link){
        if(isset($_POST['sub_sh_name'])) $textSearch = $_POST['ins_sh_name'];
        else $textSearch = '';
    ?>
        <form action="" method="post">
            <div class="form">
                <h3>Поиск по имени и/или фамилии пользователя</h3>
                <span>
                    <input type="search" pattern="[A-Za-zА-Яа-яЁё]{3,16}" name="ins_sh_name" value="<?php echo $textSearch; ?>" required="" placeholder="Введите запрос">
                </span>
                <input type="submit" name="sub_sh_name" value="Поиск">
            </div>
        </form>
    <?php
        if(isset($_POST['sub_sh_name'])){
            $sql = "SELECT users.id_users as id_users, users.img as img, users.name as name, users.surname as surname, city.name as city FROM `users`,city WHERE city.id_city=users.id_city and (users.name = '".$_POST['ins_sh_name']."' or users.surname = '".$_POST['ins_sh_name']."')";
            $data = mysqli_query($link,$sql);
            $i = 0;
            while($row = $data->fetch_assoc())
            {
                $i++;
    ?>
        <div class="users">
            <img width="100" src="<?php echo $row['img']; ?>" class="image" alt="Фотография">
            <div class="userdan">
                <h4><?php echo $row['name'].' '.$row['surname']; ?></h4>
                <p>Город: <?php echo $row['city']; ?></p>
            </div>
        </div>
    <?
            }
            if($i == 0) echo "Ничего не обнаружено";
        }
    ?>
    <?php
        }
?>