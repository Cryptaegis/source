<?php
$user='root';
$pass='';

try{
    $db = new PDO ('mysql:host=localhost; dbname=agent_s', $user, $pass);
    
    echo ("Connect Successfully!");


}catch (PDOException $e){
    print "Could not connect!: " . $e->getMessage() . "<br/>";
    die;
}

