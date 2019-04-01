<?php

    include_once 'Database.inc.php';


    if ($_SERVER['REQUEST_METHOD']== 'POST')
    {
        if ($_POST['Password_Register'] == $_POST['Password_Register2'])
        {
            $Username = $conn->real_escape_string($_POST['Username_Register']);
            $Email = $conn->real_escape_string($_POST['Email_Register']);
            $Password_Hash = password_hash($_POST['Password_Register'], PASSWORD_DEFAULT);


            $_SESSION['Username'] =$Username;

            $sql ="INSERT INTO users(username, email, password)" . "VALUES ('$Username', '$Email', '$Password_Hash')";

            if ($conn ->query($sql) ===true)
            {
                $_SESSION['message'] = "Welkom $Username!";
            }
            else
                {
                    $_SESSION['message'] = "Er is iets fout gegaan";
                }
        }
    }

?>