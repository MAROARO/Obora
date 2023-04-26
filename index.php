<?php
    session_start();
 
?>




<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Obora - Logowanie</title>
</head>
<body>
    <form action="login.php" method="post">
        <label for="nick"> Ksywa </label>
        <br>
        <input type="text" name="nick">
        <br>

        <label for="haslo"> Hasło </label> 
        <br>
        <input type="password" name="haslo">
        <br>
        <br>
        <input type="submit" value="zaloguj się">
    </form>


    <?php
        if(isset($_SESSION['blad'])){
            echo $_SESSION['blad'];
        }


    ?>
</body>
</html>