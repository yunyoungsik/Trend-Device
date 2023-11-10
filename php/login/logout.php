<?php
    include "../connect/session.php";

    // unset($_SESSION['memberID']);
    // unset($_SESSION['youEmail']);
    // unset($_SESSION['youName']);
    session_unset();
    Header("Location: ../main/main.php");
?>