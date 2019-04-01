<?php

    include_once 'Database.inc.php';


    session_start();

    $password_Login = $_POST['Password_Login'];
    $username_Login = $_POST['Username_Login'];

    $sqlinsert = "SELECT * FROM users WHERE username = '$username_Login'";
    $result = mysqli_query($conn, $sqlinsert);
        if ($result->num_rows>=1)
        {
            $row = $result->fetch_array(MYSQLI_ASSOC);
                if (password_verify($password_Login, $row['password']))
                {
                    $_SESSION['Users'] =$username_Login;
                    header("Location: http://localhost/voetbalkantine/Account.php");
                    exit();
                }
                else
                    echo "Wachtwoord klopt niet" .$row['password'];
        }
        else echo "Je komt niet in de If statement"


?>