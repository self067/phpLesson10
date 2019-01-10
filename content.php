<?php

//session_start();

if( !$_SESSION['login'] || !$_SESSION['pass']){
  header("Location: login.php");
  die();
}
if(  isset( $_POST['logout'])){
  session_destroy();
  header('Location: login.php');
}

//setcookie('bg', $_POST['bg'], time()+120);
$bg = $_SESSION['bgcolor'];

//echo "<body bgcolor=#$bg>";

?>

<body style="font-size: 40px; background-color: <?php #$bg;?>">
<p>Только для авторизированных пользователей</p>
<?php
echo "Привет, ". $_SESSION['login'] . "<br>" ;
?>
<img src="8.jpg" alt="" width="600" style="display: block">
<form method="POST" style="margin: 40px; font-size: 40px;">
  <input style="font-size: 30px;" type="submit" name="logout" value="Выход">
</form>

</body>

