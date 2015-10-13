<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 18/09/2015
 * Time: 12:22 PM
 */

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'wordsearch';

//create connection
$conn = mysqli_connect($servername,$username,$password);
//check connection
if(!$conn)
{
    die("Connection failed: ".mysqli_connect_error());
}
//create db statement which creates a db called word search
$sql = "CREATE DATABASE wordsearch";
//initialise the db
if(mysqli_query($conn,$sql))
{
    echo "Database wordsearch created successfully";
}
else
{
    echo "Error creating database: ".mysqli_error($conn);
}

mysqli_close($conn);

$conn = new mysqli($servername,$username,$password,$dbname);
if(!$conn)
{
    die("Connection failed: ".mysqli_connect_error());
}
//create table, first check if already exists
$val = mysqli_query($conn,"SELECT 1 FROM wordsearch");
if($val !== false)
{
    echo "Table already exists";
}
else
{
    $tablesql = "CREATE TABLE topwords(
					ID int NOT NULL AUTO_INCREMENT,
					servername VARCHAR(255) NOT NULL,
					words VARCHAR(100) NOT NULL,
					PRIMARY KEY (ID))";

    if(mysqli_query($conn,$tablesql) === true)
    {
        echo "Table created";
    }
    else
    {
        "Error creating table: ".mysqli_error($conn);
    }
}
?>