<?php
//Database access functions//
require "mysql.php";

//Show mySQL error
function show_error() {
    die("Error: " . mysql_errno() . " : " . mysql_error());
}

//Connect to the mySQL server and select databse
function mysql_open() {
    $connection = mysql_connect(HOST, USER, PASSWORD)
    or show_error();
    
    mysql_select_db(DATABASE, $connection)
    or show_error();
    
    return $connection;
}
?>