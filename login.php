<?php
session_start();
ini_set('session.gc.maxlifetime', 3600);

//var_dump($_SESSION);

if( $_SESSION['login'] && $_SESSION['pass'] ){
  header("Location: content.php");
  die();
}

//var_dump($_POST);

if( $_POST['login']){
  $connection = new PDO('mysql:host=jktu.ru; dbname=selto149_php; charset=utf8', 'selto149_php', 'AcademyPHP2@');
  $login = $connection->query('select * from `login`;');
  foreach ( $login as $log){
    if($_POST['login']== $log['user']  && $_POST['pass']== $log['pass']){
      $_SESSION['login'] = $_POST['login'];
      $_SESSION['pass'] = $_POST['pass'];
      $_SESSION['bgcolor'] = $_POST['bg'];
      setcookie('bg', $_POST['bg'], time()+3600);
      header('Location: content.php');
      die();
    }
  }
  echo "Неверный логин или пароль";
}



if( $_POST['newlogin']){
  if( $_POST['newpass'] != $_POST['verify-newpass'] ){
    echo "Пароли не совпадают";

  }else {
    $connection = new PDO('mysql:host=jktu.ru; dbname=selto149_php; charset=utf8', 'selto149_php', 'AcademyPHP2@');
    $newlogin = $_POST['newlogin'];
    $login = $connection->query('select * from `login` where user=$newlogin;');



  }


  foreach ( $login as $log){
    if($_POST['login']== $log['user']  && $_POST['pass']== $log['pass']){
      $_SESSION['login'] = $_POST['login'];
      $_SESSION['pass'] = $_POST['pass'];
      $_SESSION['bgcolor'] = $_POST['bg'];
      setcookie('bg', $_POST['bg'], time()+3600);
      header('Location: content.php');
      die();
    }
  }
  echo "Неверный логин или пароль";
}







?>
  <style>
    body  {
      margin: 100px 200px;
    }
    input, p, select, span {
      font-size: 30px;
      margin: 10px;
    }
    .regform {
        margin-top: 40px;
    }

  </style>

  <form class="logform" method="POST">
    <p>Авторизоваться</p>
    <input type="text" name="login" required placeholder="Логин"><br>
    <input type="password" name="pass" required placeholder="Пароль"><br>
<!--      <span>Цвет фона</span>-->
<!--      <select>-->
<!--          <option>Желтый</option>-->
<!--          <option>Зеленый</option>-->
<!--          <option>Голубой</option>-->
<!--      </select>-->

      <p>Укажите цвет фона: <input type="color" name="bg" value="#ff0000"></p>
    <input type="submit" value="Вход">

  </form>


    <form class="regform" method="POST">
        <p>Зарегистрироваться</p>
        <input type="text" name="newlogin" required placeholder="Логин"><br>
        <input type="password" name="newpass" required placeholder="Пароль"><br>
        <input type="password" name="verify-newpass" required placeholder="Повторите пароль"><br>
        <!--      <span>Цвет фона</span>-->
        <!--      <select>-->
        <!--          <option>Желтый</option>-->
        <!--          <option>Зеленый</option>-->
        <!--          <option>Голубой</option>-->
        <!--      </select>-->

<!--        <p>Укажите цвет фона: <input type="color" name="bg" value="#ff0000"></p>-->
        <input type="submit" value="Регистрация">
   </form>



<?php

