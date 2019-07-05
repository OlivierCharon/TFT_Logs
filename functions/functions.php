<?php
    
    function connectDB()
    {
        $host = "localhost";
        $dbname = "Tftlogs";
        $user = "root";
        $password = "0000";
        
        // Create connection
        $connexion = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $user, $password);
        if (!$connexion) {
            var_dump("DB disconnected");
        }
        return $connexion;
    }
    
    function imgToData()
    {
        $targetDir = __DIR__ . "/content";
        $target_file = $targetDir . basename($_FILES["pictureToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo("<script> alert('L\'image n\'a pu être téléchargée. Merci de choisir un fichier .jpg, .jpeg, .png ou .gif'); window.location.href='javascript:history.go(-1)'; </script>");
        } else {
            $blob = fopen($_FILES["pictureToUpload"]["tmp_name"], 'rb');
            $data = fread($blob, $_FILES["pictureToUpload"]["size"]);
            $data = base64_encode($data);
            
            fclose($blob);
            return $data;
        }
    }