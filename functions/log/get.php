<?php
    require(dirname(__DIR__). "/functions.php");
    
    $connexion = connectDB();
    $logs_query = $connexion->prepare("SELECT logs.id, users.nickname as user, users.id as user_id, logs.date, logs.title, logs.log_picture, logs.description, logs.result FROM logs INNER JOIN users ON users.id = logs.user_id ORDER BY date DESC");
    $logs_query->execute();
    $logs = $logs_query->fetchAll();