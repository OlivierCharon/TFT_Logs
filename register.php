<?php
    require(__DIR__ . "/header.php");
?>

<form id="register-overlay" action="/functions/user/create.php" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>S'enregistrer</legend>
        
        <div class="form-group">
            <label for="nicknameInput">Pseudo</label>
            <input type="text" name="nickname" class="form-control" id="nicknameInput" placeholder="Pseudo" required>
        </div>
        
        <div class="form-group">
            <label for="passwordInput">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Mot de passe" required>
        </div>
    
        <div class="form-group">
            <label for="confirmPasswordInput">Confirmer le mot de passe</label>
            <input type="password" name="confirmPassword" class="form-control" id="confirmPasswordInput" placeholder="Mot de passe" required>
        </div>
        
        <div class="form-group">
            <label for="emailInput">Adresse email</label>
            <input type="email" name="email" class="form-control" id="emailInput" aria-describedby="emailHelp" placeholder="adresse@email.com" required>
            <small id="emailHelp" class="form-text text-muted">Ces données sont confidentielles et ne seront pas partagées</small>
        </div>
        
        <div class="form-group">
            <label for="profilImageInput">Image de profil</label>
            <input type="file" class="form-control-file" id="profilImageInput" aria-describedby="fileHelp" name="pictureToUpload">
            <small id="fileHelp" class="form-text text-muted">L'image doit respecter ces critères: .png, .gif, .jpeg ou .jpg</small>
        </div>
        
        <div class="form-group">
            <label for="descriptionInput">Description</label>
            <textarea class="form-control" name="description" id="descriptionInput" rows="3" placeholder="Dites nous qui vous êtes..."></textarea>
        </div>
        
        <input type="submit" class="btn btn-primary" value="Créer mon compte">
    </fieldset>
</form>

<?php
    require(__DIR__ . "/footer.php");
?>