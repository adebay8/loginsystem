<?php

    //define constant variable

    define('DB_NAME', 'register_db');
    define('DB_USER', 'root');
    define('DB_PASSWORD', "");
    define('DB_HOST', 'localhost');
    define('DB_PORT', 3307);

    try{
        //connection variable
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

        mysqli_set_charset($conn, 'utf8');
    }catch(Exception $ex){
        print"An Exception occurred. Message: ".$ex->getMessage();
    }catch(Exception $e){
        print"The system is busy try again later";
    }

?>