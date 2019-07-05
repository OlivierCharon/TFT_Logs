<?php
    require(dirname(__DIR__) . "/functions.php");
    
    $connexion = connectDB();
    
    // Validate username
    if (empty(($_POST["nickname"]))) {
        echo("<script> alert('Vous n\'avez pas renseigné de pseudo utilisateur.'); window.location.href='javascript:history.go(-1)'; </script>");
    } else {
        // Prepare a select statement
        $checkNickname = "SELECT users.nickname FROM users WHERE nickname = :nickname";
        if ($connexion->prepare($checkNickname)) {
            $checkNickname = $connexion->prepare($checkNickname);
            // Bind variables to the prepared statement as parameters
            $checkNickname->bindParam(':nickname', $_POST['nickname']);
            $checkNickname->execute();
            $foundNickname = $checkNickname->fetchAll();
            
            if (!empty($foundNickname)) {
                echo("<script> alert('Ce pseudo est déjà pris. Veuillez en choisir un autre.'); window.location.href='javascript:history.go(-1)'; </script>");
            } else {
                // Validate password
                if (empty($_POST["password"])) {
                    echo("<script> alert('Veuillez renseigner votre mot de passe.'); window.location.href='javascript:history.go(-1)'; </script>");
                } else {
                    // Validate confirm password
                    if (empty($_POST["confirmPassword"])) {
                        echo("<script> alert('Merci de confirmer votre mot de passe.'); window.location.href='javascript:history.go(-1)'; </script>");
                    } else if (($_POST ['password'] != $_POST['confirmPassword'])) {
                        echo("<script> alert('Les mots de passe renseignés ne sont pas identiques'); window.location.href='javascript:history.go(-1)'; </script>");
                    } else {
                        if (empty($_POST['email'])) {
                            echo("<script> alert('Veuillez entrer une adresse mail.'); window.location.href='javascript:history.go(-1)'; </script>");
                        } else {
                            $data = imgToData();
                            $createUser = "INSERT INTO users (right_id, nickname, password, email, profil_picture, description) VALUES (default, :nickname, SHA2(:password,256), :email, :data, :description)";
                            $createUser = $connexion->prepare($createUser);
                            $createUser->bindParam(':nickname', $_POST['nickname']);
                            $createUser->bindParam(':password', $_POST['password']);
                            $createUser->bindParam(':email', $_POST['email']);
                            $createUser->bindParam(':data', $data, PDO::PARAM_LOB);
                            $createUser->bindParam(':description', $_POST['description']);
                            $createUser->execute();
                            header('location: /registerConfirmation.php');
                        }
                    }
                }
            }
        } else {
            echo("<script> alert('Oops! Un erreur est survenue! Veuillez réessayer plus tard.'); window.location.href='/index.php'; </script>");
        }
    }