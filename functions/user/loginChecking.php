<?php
    require(dirname(__DIR__) . "/functions.php");
    $connexion = connectDB();
    
    if(empty($_POST['nickname'])){
    
    } else {
        if (empty($_POST['password'])) {
        
        } else {
            $checkAccount = "SELECT * FROM users WHERE nickname = :nickname AND password = SHA2(:password,256)";
            $checkAccount = $connexion->prepare($checkAccount);
            $checkAccount->bindParam(':nickname', $_POST['nickname']);
            $checkAccount->bindParam(':password', $_POST['password']);
            $checkAccount->execute();
            $accountFound = $checkAccount->fetch(PDO::FETCH_ASSOC);
            
            if (!empty($accountFound)) {
                session_start();
                $_SESSION = $accountFound;
                header("location: /index.php");
            } else {
                echo("<script> alert('Votre identifiant / mot de passe est faux'); window.location.href='javascript:history.go(-1)'; </script>");
            }
        }
    }
    