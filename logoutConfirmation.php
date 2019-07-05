<?php
    require(__DIR__ . "/header.php");
?>
    <main class="container-fluid" id="confirmMessage">
        <div class="col-md-9" id="no-log-found">
            <img src="/content/amumu.png" alt="Sad Amumu" id="amumu">
            <p>Au revoir, revenez vite nous voir!</p>
        </div>
    </main>
    <script> setTimeout(function () {
            window.location.href = '/index.php';
        }, 3000); </script>
<?php
    require(__DIR__ . "/footer.php");
?>