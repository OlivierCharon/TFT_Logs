<?php
    require(__DIR__ . "/header.php");
    require(__DIR__ . "/functions/log/get.php");
    $nbLogArticles = 1;
//    var_dump($_SESSION);
//    die;
?>
    <main class="container-fluid" id="index">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title">Historique des parties</h1>
            </div>
        </div>
        <div class="row logs-article-line">
        <?php if(count($logs) == 0) {?>
            <div class="col-md-9" id="no-log-found">
                <p>Il n'y a aucun log pour le moment.</p>
                <p>Aller dans <a href="createLog.php">envoyer un log</a> pour en ajouter.</p>
            </div>
        </div>
        <?php } else {
            foreach ($logs as $log) {
                if ($nbLogArticles > 3) { ?>
                    </div>
                    <div class="row logs-article-line">
                        <?php $nbLogArticles = 1;
                } else { ?>
                    <div class="card-deck logs-article col-md-4">
                        <div class="card">
                            <img class="imgPost" src="<?= ('data:image/jpeg;base64,' . $log['log_picture']) ?>"
                                 alt="<?= ($log["title"]) ?>"/>
                            <div class="card-body">
                                <h5 class="card-title"><?= ($log["title"]) ?></h5>
                                <p class="card-text"><?= ($log["description"]) ?></p>
                                <p class="card-text date-article"><?= $log["user"]?> - <?= ($log["date"]) ?></p>
                                <?php if($_SESSION['id'] == $log['user_id'] || $_SESSION['right_id'] == 1){ ?>
                                    <p class="card-text date-article"><a href="/editLog.php?log_id=<?=$log['id']?>">Editer</a> - <a href="/functions/log/delete.php?log_id=<?=$log['id']?>">Supprimer</a></p>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                    <?php $nbLogArticles++;
                }
            }
        }?>
    </main>
    
<?php
    require(__DIR__ . "/footer.php");
?>