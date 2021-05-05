<?php
    define("MYSQL_CONN_ERROR", "Unable to connect to database.");
    
    // Ensure reporting is setup correctly
    mysqli_report(MYSQLI_REPORT_STRICT);

    //local database
    $dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "loginuser";   

    // Connect function for database access
    function connect($usr,$pw,$db,$host) {
        try {
            $GLOBALS['conn'] = mysqli_connect($host,$usr,$pw,$db);
        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
    }

    //connect to database
    try {
        connect($dbUserName,$dbPassword,$dbName,$dbServerName);
    } 
    
    //throw error page when connection fails
    catch (Exception $e) {
        header('Location: ' . '/Error/dbError');
        exit(); 
    }
?>