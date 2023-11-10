<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $memberID = $_SESSION['memberID'];
    $newPass = mysqli_real_escape_string($connect, $_POST['newPass']);

    $sql = "UPDATE tdMembers SET youPass = '$newPass' WHERE memberID = '$memberID'";
    $result = $connect -> query($sql);
    Header("Location:mypage.php");
?>