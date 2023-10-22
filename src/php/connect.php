<?php
$hs='localhost';
$us='root';
$ps='root';
$db='agent';

$mysqlconnect = mysqli_connect("$hs","$us","$ps", $db);

if($mysqlconnect === false){
    die("Could not connect");

}else{
    echo ("Connect Successfully!");
}