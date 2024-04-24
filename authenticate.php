<?php

/*******w******** 
    
    Name: Abigail Ferreira
    Date: 2024-04-23
    Description: authenticate page for user log ins

****************/

  define('ADMIN_LOGIN','potteryLover');

  define('ADMIN_PASSWORD','myPass');

  if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])

      || ($_SERVER['PHP_AUTH_USER'] != ADMIN_LOGIN)

      || ($_SERVER['PHP_AUTH_PW'] != ADMIN_PASSWORD)) {

    header('HTTP/1.1 401 Unauthorized');

    header('WWW-Authenticate: Basic realm="Our Blog"');

    exit("Access Denied: Username and password required.");

  }

   
?>