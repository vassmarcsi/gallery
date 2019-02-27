<?php
session_start();
require_once('../config/connect.php');
if (isset($_POST['enter'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    $sql = "SELECT * FROM user WHERE email=? AND password = ?";
    $stmt = $conn->prepare($sql); //statement
    $stmt->bind_param("ss", $email, $pwd); //string, integer, double, blob
    //azért két S, mert 2 db string van
    $stmt->execute(); //most hajtódik végre a select
    $stmt->store_result();//numrows adatainak lekéréséhez kell

    if ($stmt->num_rows == 1) {
        //sikeresen bejelentkezett
        $stmt->bind_result($id, $email, $password, $firstname, $lastname);
        $stmt->fetch();
        $_SESSION['userid'] = $id;
        //var_dump($_SESSION);
    } else {
        //érvénytelen felhasználónév vagy jelszó
        header("Location: ../index.php");
    }
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Felhasználó</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="gallery.php" class="nav-link">Galéria</a>
                </li>
                <li class="nav-item">
                    <a href="upload.php" class="nav-link">Kép feltöltése</a>
                </li>
                <?php
                if (isset($_SESSION['userid'])) {
                    echo "<a href='logout.php' class='nav-link'>Kilépés</a>";
                }
                ?>
            </ul>
        </nav>
        <?php
            echo "<h3>{$firstname} {$lastname} néven jelentkezett be.</h3>";
        ?>
    </body>
</html>

<?php
$stmt->close();
$conn->close();
?>