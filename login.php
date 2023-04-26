<?php

    session_start();
    if((!isset($_POST['nick']))||(!isset($_POST['haslo']))){
        header('Location: index.php');
        exit();
    }
    require_once "connect.php";

    $polaczenie = @ new mysqli($host, $db_user, $db_password, $db_name);

    $login = $_POST['nick'];
    $haslo = $_POST['haslo'];

    $login = htmlentities($login);
    $haslo = htmlentities($haslo);

    if($rezultat = $polaczenie->query(sprintf("Select * from ludzie where (imie ='%s' || ksywa='%s') and nazwisko='%s'",
    mysqli_real_escape_string($polaczenie,$login),mysqli_real_escape_string($polaczenie,$login),mysqli_real_escape_string($polaczenie,$haslo)))){
        if($rezultat->num_rows == 1){
            $wiersz = $rezultat->fetch_assoc();
            $rezultat->close();

            $_SESSION['zalogowany'] = true;
            $_SESSION['id'] = $wiersz['id'];
            $_SESSION['ksywa'] = $wiersz['ksywa'];
            $_SESSION['imie'] = $wiersz['imie'];
            $_SESSION['nazwisko'] = $wiersz['nazwisko'];
            $_SESSION['wiek'] = $wiersz['wiek'];
            $_SESSION['klata'] = $wiersz['klata'];

            unset($_SESSION['blad']);

            header('Location: profil.php');
        }else{
            $_SESSION['blad'] = "<p>Nieprawidłowe dane logowania</p>";
            header('Location: index.php');
            exit();
        }


    }
    
    


    $polaczenie->close();
?>