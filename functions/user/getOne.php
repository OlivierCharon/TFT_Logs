<?php
    require(dirname(__DIR__). "/functions.php");
    
    $connexion = connectDB();
    // SELECT ALL USERS
    $searchUser = $connexion->prepare("SELECT * FROM users WHERE MATCH (nickname) AGAINST (:search)");
    $searchUser= $connexion->prepare($searchUser);
    $searchUser->bindParam(':search', $_POST['search']);
    $searchUser->execute();
    $userFound = $searchUser->fetch(PDO::FETCH_ASSOC);
    var_dump($userFound);