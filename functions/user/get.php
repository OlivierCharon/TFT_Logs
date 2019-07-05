<?php
    require(dirname(__DIR__). "/functions.php");
    
    $connexion = connectDB();
    // SELECT ALL USERS
    $users_query = $connexion->prepare("SELECT * FROM users");
    $users_query->execute();
    return $users = $users_query->fetchAll();