<?php
    require(dirname(__DIR__) . "/functions.php");
    session_start();
    $connexion = connectDB();
    $data = imgToData();
    
    if (empty($data)) {
        echo("<script> alert('Vous n\'avez pas upload votre log ou il n\'a pas le bon format (png, jpg ou gif)); window.location.href='javascript:history.go(-1)';</script>");
    } else {
        // Validate username
        if (empty(($_POST["title"]))) {
            echo("<script> alert('Vous n\'avez pas renseigné de titre à votre publication.'); window.location.href='javascript:history.go(-1)';</script>");
        } else {
            if (empty($_POST['result'])) {
                echo("<script> alert('Merci d\'indiquer votre classement en fin de partie'.'); window.location.href='javascript:history.go(-1)'; </script>");
            } else {
                // Validate confirm password
                if (empty($_POST["description"])) {
                    echo("<script> alert('Merci de commenter votre publication.'); window.location.href='javascript:history.go(-1)'; </script>");
                } else {
                    
                    $createLog = "INSERT INTO logs (user_id, title, log_picture, description, result) VALUES (:user_id, :title, :log_picture, :description, :result)";
                    $createLog = $connexion->prepare($createLog);
                    $createLog->bindParam(':user_id', $_SESSION['id']);
                    $createLog->bindParam(':title', $_POST['title']);
                    $createLog->bindParam(':log_picture', $data, PDO::PARAM_LOB);
                    $createLog->bindParam(':description', $_POST['description']);
                    $createLog->bindParam(':result', $_POST['result']);
                    $createLog->execute();
                    header('location: /createLogConfirmation.php');
                }
                
            }
        }
    }