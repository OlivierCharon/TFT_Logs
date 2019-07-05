<?php
    require(__DIR__ . "/header.php");
?>
    
    <form id="newLog-overlay" action="/functions/log/create.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Envoyer un nouveau log</legend>
            
            <div class="form-group">
                <label for="screenInput">Screen de fin de partie</label>
                <input type="file" class="form-control-file" id="screenInput" aria-describedby="fileHelp" name="pictureToUpload" required>
                <small id="fileHelp" class="form-text text-muted">L'image doit respecter ces critères: .png, .gif, .jpeg
                    ou .jpg
                </small>
            </div>
            
            <div class="form-group">
                <label for="titleInput">Titre</label>
                <input type="text" name="title" class="form-control" id="titleInput" placeholder="Titre" required>
            </div>
            
            <div class="form-group">
                <label for="positionInput">Position</label>
                <input type="number" name="result" class="form-control" id="positionInput" placeholder="Position" required>
            </div>
            
            <div class="form-group">
                <label for="descriptionInput">Description</label>
                <textarea class="form-control" name="description" id="descriptionInput" rows="3"
                          placeholder="Items, classes, origines, difficultés rencontrées..." required></textarea>
            </div>
            
            <input type="submit" class="btn btn-primary" value="Envoyer mon log">
        </fieldset>
    </form>

<?php
    require(__DIR__ . "/footer.php");
?>