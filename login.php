<?php
session_start();
ini_set('session.gc.maxlifetime', 3600);

if( $_SESSION['login'] && $_SESSION['pass']){
  header("Location: content.php");
  die();
}



$connection = new PDO('mysql:host=jktu.ru; dbname=selto149_php; charset=utf8', 'selto149_php', 'AcademyPHP2@');
$login = $connection->query('select * from `login`;');





if( $_POST['login']){
  foreach ( $login as $log){
    if($_POST['login']== $log['user']  && $_POST['pass']== $log['pass']){
      $_SESSION['login'] = $_POST['login'];
      $_SESSION['pass'] = $_POST['pass'];
      header('Location: content.php');
    }
  }
  echo "Неверный логин или пароль";
}


?>
  <style>
    body  {
      margin: 200px 300px;
    }
    input, p {
      font-size: 30px;
      margin: 10px;
    }
  </style>

  <form method="POST">
    <p>Авторизоваться</p>
    <input type="text" name="login" required placeholder="Логин"><br>
    <input type="password" name="pass" required placeholder="Пароль"><br>
    <input type="submit">
  </form>
<?php

//var_dump($_COOKIE);