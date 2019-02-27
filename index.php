<?php
session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Galéria</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <form action="php/user.php" method="post">
                        <input type="text" required placeholder="E-mail" name="email" class="form-control">
                        <input type="password" required placeholder="Jelszó" name="pwd" class="form-control">
                        <input type="submit" value="Belépés" name="enter" class="btn btn-primary">
                    </form>
                </div>
            </div>

            <?php
            if (isset($_SESSION['jogosulatlan']) && $_SESSION['jogosulatlan'] == 'true') {
                //if (isset($_SESSION['jogosulatlan']) && $_SESSION['jogosulatlan']) {
                echo file_get_contents("html/error.html");
                unset($_SESSION['jogosulatlan']);
            }
            ?>

        </div>
    </body>
</html>
