<?php
    header('content-type: text/html; charset: UTF-8');
    if(count($_REQUEST)>0){
        require_once 'apiEngine.php';
        foreach ($_REQUEST as $method => $value){
            $apiEngine = new apiEngine($value, $method);
            echo $apiEngine -> callApi();
            break;
        }
    }
    //http://localhost/api/?apiTest.test=test2
