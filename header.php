<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    <title>TFT Logs</title>
</head>
<body>
<?php
    session_start();
    //        var_dump($_SESSION);
    //        var_dump($_SESSION['user']['nickname']);
    //
    //        die;
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="main-nav">
    <a class="navbar-brand" href="/index.php">TFT Logs</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/index.php">Récents<span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="/createLog.php">Envoyer un log</a>
            </li>
            
            <li class="nav-item dropdown" title="A venir">
                <a class="nav-link dropdown-toggle disabled" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tier-lists
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Champions</a>
                    <a class="dropdown-item" href="#">Items</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Compos</a>
                </div>
            </li>
            <li class="nav-item" title="A venir">
                <a class="nav-link disabled" href="#">Patch-notes</a>
            </li>
        </ul>
        
        <div id="account-search" class="container">
            <div class="row" id="account">
                <?php if ($_SESSION) { ?>
                    <i class="fab fa-amazon"></i>
                    <p class="col-md-7"><i class="fas fa-user-circle"></i><?= $_SESSION['nickname'] ?> </p>
                    <a class="button btn btn-warning my-2 my-sm-0 col-md-4 " href="/functions/user/logout.php">Déconnexion</a>
                <?php } else { ?>
                    <a class="btn btn-primary my-2 my-sm-0 col-md-7" href="login.php">Se connecter</a>
                    <a class="btn btn-primary my-2 my-sm-0 col-md-4 " href="register.php">S'enregistrer</a>
                <?php } ?>
            
            </div>
            
            
            <form class="form-inline my-2 my-lg-0 row" id="global-search" action="/functions/user/getOne.php"
                  method="POST">
                <input class="form-control mr-sm-2 col-md-7" type="text" placeholder="Rechercher" name="search">
                <button class="btn btn-secondary my-2 my-sm-0 col-md-4" type="submit">Rechercher</button>
            </form>
        </div>
    </div>
</nav>