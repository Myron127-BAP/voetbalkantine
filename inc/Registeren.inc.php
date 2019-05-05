<?php

    include_once 'Database.inc.php';


    session_start();
    if ($_SERVER['REQUEST_METHOD']== 'POST')
    {
        if ($_POST['Password_Register'] == $_POST['Password_Register2'])
        {
            $Username = $conn->real_escape_string($_POST['Username_Register']);
            $Email = $conn->real_escape_string($_POST['Email_Register']);
            $Password = password_hash($_POST['Password_Register'], PASSWORD_DEFAULT);

            $sql ="INSERT INTO users(username, email, password)" . "VALUES ('$Username', '$Email', '$Password')";

            if ($conn ->query($sql) === true)
            {
                $_SESSION['user'] = $Username;
                header("location: Account.php");
            }
        }
        else
        {
            $_SESSION['message'] = "Je wachtwoord is niet gelijk!";
        }
    }

?>