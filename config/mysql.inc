<?php

    $hostname = 'kapiital-prod.cluster-chapacpavshi.ap-south-1.rds.amazonaws.com';       
    $dbname   = 'PaisaNow_Prod';
    $username = 'admin';            
    $password = '3w9bag838lpkL47IG0CepezKI4';  

    $connect_var = mysqli_connect($hostname, $username, $password, $dbname, 3306) or DIE('Connection to host is failed, perhaps the service is down!') or die(mysql_error());
    mysqli_set_charset($connect_var,"utf8");
?>