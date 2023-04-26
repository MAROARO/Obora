<?php
    session_start();
    if(!isset($_SESSION['zalogowany'])){

        header('Location: index.php');
        exit();
    }
?>




<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Obora - Represent</title>
</head>
<body>

    <?php
        echo<<<END
            $_SESSION[imie] "$_SESSION[ksywa]" $_SESSION[nazwisko] <br>
            Wiek: $_SESSION[wiek] <br>
            Klata: $_SESSION[klata] kg<br>

        END;
    ?>
    <form action="logout.php">

    <input type="submit" value="wyloguj się">
    </form>
</body>
</html>