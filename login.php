<?php
session_start();
ini_set('session.gc.maxlifetime', 3600);

if(  isset( $_SESSION['login'] ) && isset( $_SESSION['pass'] )){
  header("Location: content.php");
  die();
}

if( isset( $_POST['login'])){
  $connection = new PDO('mysql:host=jktu.ru; dbname=selto149_php; charset=utf8', 'selto149_php', 'AcademyPHP2@');
  $login = $connection->query('select * from `login`;');
  foreach ( $login as $log){
    if($_POST['login']== $log['user']  && $_POST['pass']== $log['pass']){
      $_SESSION['login'] = $_POST['login'];
      $_SESSION['pass'] = $_POST['pass'];
      $_SESSION['bgcolor'] = $_POST['bg'];
      setcookie('bg', $_POST['bg'], time()+360);
      header('Location: content.php');
//      die();
    }
  }
  echo "Неверный логин или пароль";
}


?>
  <style>
    body  {
      margin: 100px 300px;
    }
    input, p, select, span {
      font-size: 30px;
      margin: 10px;

    }
  </style>

  <form method="POST">
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
<!--          <input type="submit" value="Выбрать">-->


    <input type="submit" value="Вход">
  </form>
<?php

//var_dump($_COOKIE);