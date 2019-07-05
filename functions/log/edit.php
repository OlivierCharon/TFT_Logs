<?php
    require(dirname(__DIR__) . "/functions.php");
    session_start();
    $connexion = connectDB();
    
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
                    if (!empty($_FILES["pictureToUpload"]['name'])) {
                        $data = imgToData();
                        $createLog = "UPDATE logs set user_id = :user_id, title = :title, log_picture = :log_picture, description = :description, result = :result WHERE id = :log_id";
                        $createLog = $connexion->prepare($createLog);
                        $createLog->bindParam(':user_id', $_SESSION['id']);
                        $createLog->bindParam(':title', $_POST['title']);
                        $createLog->bindParam(':log_picture', $data, PDO::PARAM_LOB);
                        $createLog->bindParam(':description', $_POST['description']);
                        $createLog->bindParam(':result', $_POST['result']);
                        $createLog->bindParam(':log_id', $_GET['log_id']);
                        $createLog->execute();
                    } else {
                        $createLog = "UPDATE logs SET user_id = :user_id, title = :title, description = :description, result = :result WHERE id = :log_id";
                        $createLog = $connexion->prepare($createLog);
                        $createLog->bindParam(':user_id', $_SESSION['id']);
                        $createLog->bindParam(':title', $_POST['title']);
                        $createLog->bindParam(':description', $_POST['description']);
                        $createLog->bindParam(':result', $_POST['result']);
                        $createLog->bindParam(':log_id', $_GET['log_id']);
                        $createLog->execute();
                    }
                    header('location: /editLogConfirmation.php');
                }
    
            }
    }