<?php

    session_start();
    session_destroy();
    header("Location: http://localhost/voetbalkantine/Inloggen.php");
    exit;