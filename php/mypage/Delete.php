<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $memberID = $_SESSION['memberID'];

    $sql = "DELETE FROM tdMembers WHERE memberID = '$memberID'";
    $result = $connect -> query($sql);
    session_unset();
    Header("Location: ../main/main.php");
?>