<?php
session_start();
include('dbcon.php');


if (isset($_POST['register_btn'])) { //creare cont
    $nume = mysqli_real_escape_string($con, $_POST['nume']);
    $prenume = mysqli_real_escape_string($con, $_POST['prenume']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $strada = mysqli_real_escape_string($con, $_POST['strada']);
    $numarul = mysqli_real_escape_string($con, $_POST['numarul']);
    $localitate = mysqli_real_escape_string($con, $_POST['localitate']);
    $judet = mysqli_real_escape_string($con, $_POST['judet']);
    $telefon = mysqli_real_escape_string($con, $_POST['telefon']);
    $parola = mysqli_real_escape_string($con, $_POST['parola']);


    $check_email_query = "SELECT email FROM utilizatori WHERE email='$email'"; //verifica daca email ul exista
    $check_email_query_run = mysqli_query($con, $check_email_query);
    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['message'] = "Adresa de email exista deja!";
        header('Location: inregistrare.php');
    } else {


     
    $insert_query = "INSERT INTO utilizatori(nume, prenume, email, strada, numarul, localitate, judet, telefon, parola, tip_utilizator) VALUES ('$nume', '$prenume', '$email', '$strada', '$numarul', '$localitate', '$judet', '$telefon', '$parola', '0')";
    $insert_query_run = mysqli_query($con, $insert_query);

            if ($insert_query_run) {
                $_SESSION['message'] = "Cont a fost creat cu succes!";
                header('Location: login.php');
            } else {
                $_SESSION['message'] = "Înregistrare nereușită!";
                header('Location: inregistrare.php');
            }
        
    }
} else if (isset($_POST['login_btn'])) { //logare
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $parola= mysqli_real_escape_string($con, $_POST['parola']);

    $login_query = "SELECT * FROM utilizatori WHERE email='$email' AND parola='$parola'";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $username = $userdata['prenume'];
        $nume=$userdata['nume'];
        $id = $userdata['id'];
        $phone = $userdata['telefon'];
        $useremail = $userdata['email'];
        $strada = $userdata['strada'];
        $numarul = $userdata['numarul'];
        $localitate = $userdata['localitate'];
        $judet = $userdata['judet'];
        $role_as = $userdata['tip_utilizator'];
        $_SESSION['auth_user'] = [
            'prenume' => $username,
            'email' => $useremail

        ];
        $_SESSION['id'] = $id;
        $_SESSION['role_as'] = $role_as;
        $_SESSION['prenume'] = $username;
        $_SESSION['nume'] = $nume;
        $_SESSION['telefon'] = $phone;
        $_SESSION['email'] = $useremail;
        $_SESSION['strada'] = $strada;
        $_SESSION['numarul'] = $numarul;
        $_SESSION['localitate'] = $localitate;
        $_SESSION['judet'] = $judet;

        if ($role_as == 1) {
            $_SESSION['message'] = "Bine ai venit!";
            header('Location: dashboard.php');
        } else {
            $_SESSION['message'] = "Bine ai venit!";
            header('Location: dashboardu.php');
        }
    } else {
        $_SESSION['message'] = "Parola sau email-ul sunt incorecte!";
        header('Location: login.php');
    }
}