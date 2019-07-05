<?php
    require(__DIR__ . "/header.php");
?>
    
    <form id="login-overlay" action="/functions/user/loginChecking.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Se connecter</legend>
            
            <div class="form-group">
                <label for="nicknameInput">Pseudo</label>
                <input type="text" name="nickname" class="form-control" id="nicknameInput" placeholder="Pseudo" required>
            </div>
            
            <div class="form-group">
                <label for="passwordInput">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="passwordInput"
                       placeholder="Mot de passe" required>
            </div>
            
            <input type="submit" class="btn btn-primary" value="Me connecter">
        </fieldset>
    </form>

<?php
    require(__DIR__ . "/footer.php");
?>