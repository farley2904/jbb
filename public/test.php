 <?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    if (mail("info@jbb.com.ua", "Question", "Проверка отправки почты", "Content-type:text/html;charset=utf-8")) {
          echo "ok";
    } else {
           echo "error";}
    ?>