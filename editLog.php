<?php
    
    require(__DIR__ . "/header.php");
    require(__DIR__ . "/functions/functions.php");
    $connexion = connectDB();
    $logSearched = $connexion->prepare("SELECT * FROM logs WHERE id = :log_id");
    $logSearched->bindParam(':log_id', $_GET['log_id']);
    $logSearched->execute();
    $logFound = $logSearched->fetch(PDO::FETCH_ASSOC);
    

?>
    
    <form id="newLog-overlay" action="/functions/log/edit.php?log_id=<?=$logFound['id']?>" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Editer un log</legend>
    
            <div class="form-group">
            <img class="imgPost" src="<?= ('data:image/jpeg;base64,' . $logFound['log_picture']) ?>"
                 alt="<?= ($logFound["title"]) ?>" id="edit-log-picture"/>
            </div>
            
            <div class="form-group">
                <label for="screenInput">Screen de fin de partie</label>
                <input type="file" class="form-control-file" id="screenInput" aria-describedby="fileHelp"
                       name="pictureToUpload">
                <small id="fileHelp" class="form-text text-muted">L'image doit respecter ces critères: .png, .gif, .jpeg
                    ou .jpg
                </small>
            </div>
            
            <div class="form-group">
                <label for="titleInput">Titre</label>
                <input type="text" name="title" class="form-control" id="titleInput" placeholder="Titre"
                       value="<?= $logFound['title'] ?>" required>
            </div>
            
            <div class="form-group">
                <label for="positionInput">Position</label>
                <input type="number" name="result" class="form-control" id="positionInput" placeholder="Position"
                       value="<?= $logFound['result'] ?>" required>
            </div>
            
            <div class="form-group">
                <label for="descriptionInput">Description</label>
                <textarea class="form-control" name="description" id="descriptionInput" rows="3"
                          placeholder="Items, classes, origines, difficultés rencontrées..."
                          required><?= $logFound['description'] ?></textarea>
            </div>
            
            <input type="submit" class="btn btn-primary" value="Envoyer mon log">
        </fieldset>
    </form>

<?php
    require(__DIR__ . "/footer.php");
?>