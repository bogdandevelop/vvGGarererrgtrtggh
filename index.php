<?php
header('Content-Type: text/html; charset=utf-8');

if ($_SERVER['REQUEST_URI']=='/') {
    $Page = 'index';
    $Module = 'index';
} else {
    $URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $URL_Parts = explode('/', trim($URL_Path, '/'));
    $Page = array_shift($URL_Parts);
    $Module = array_shift($URL_Parts);


    if (!empty ($Module)) {
        $Param = array();
        for ($i = 0; $i< count($URL_Parts); $i++) {
            $Param[$URL_Parts[$i]]= $URL_Parts[++$i];   
        }
    }
}

if($Page =='index') include('page/index.php'); 
else if($Page =='login') include('page/login.php');
else if($Page =='register') include('page/register.php');
?>