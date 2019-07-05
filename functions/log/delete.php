<?php
    require(dirname(__DIR__) . "/functions.php");
    session_start();
    $connexion = connectDB();
    $data = imgToData();
    
    echo("<script>
var r = confirm(\"Êtes vous sur de vouloir supprimer ce log?\");
  if (r == false) {
    window.location.href='javascript:history.go(-1)';
  } else {
      exit();
  }
  </script>");
    
    $deleteLog = "DELETE FROM logs WHERE id = :log_id";
    $deleteLog = $connexion->prepare($deleteLog);
    $deleteLog->bindParam(':log_id', $_GET['log_id']);
    $deleteLog->execute();
    header('location: /index.php');