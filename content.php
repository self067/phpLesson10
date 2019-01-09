<?php

session_start();

if( !$_SESSION['login'] || !$_SESSION['pass']){
  header("Location: login.php");
  die();
}
if( $_POST['logout']){
  session_destroy();
  header('Location: login.php');
}

?>

<body style="font-size: 40px;">
<p>Только для авторизированных пользователей</p>

<?php
echo "Привет, ". $_SESSION['login'] . "<br>"  ;
?>

<img src="8.jpg" alt="" width="600" style="display: block">


<form method="POST" style="margin: 40px; font-size: 40px;">
  <input style="font-size: 30px;" type="submit" name="logout" value="На страницу авторизации">
</form>



</body>

