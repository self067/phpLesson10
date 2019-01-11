<?php
function sendConfirm(string $code){
if(isset($_POST['newlogin'])){
  $to = $_POST['email'];
  $subject = 'Подтверждение регистрации';
  $message = '
                <html>
                    <head>
                        <title>'.$subject.'</title>
                    </head>
                    <body>
                        <p>Вы регистрируетесь на сайте <a href="https://jktu.ru/academyphp/lesson10/login.php">Lesson10</a>, код подтверждения: '.$code.'</p>
                        <p>Имя: '.$_POST['newlogin'].'</p>
                        <p>E-mail: '.$_POST['email'].'</p>                        
                    </body>
                </html>';
  $headers  = "Content-type: text/html; charset=utf-8 \r\n";
  $headers .= "From: academyphp <academyphp@jktu.ru>\r\n";
  return mail($to, $subject, $message, $headers);
}
}
?>