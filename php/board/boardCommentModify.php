<?php
    include "../connect/connect.php";

    $commentMsg = $_POST['commentMsg'];
    // $commentPass = $_POST['commentPass'];
    $commentId = $_POST['commentId'];
    $sessionMemberId = $_SESSION['memberId']; 

    // $sql = "SELECT commentPass FROM boardComment WHERE commentPass = '$commentPass' AND commentId = '$commentId'";
    $sql = "SELECT commentPass FROM boardComment WHERE commentPass = '$commentPass' AND commentId = '$commentId' AND memberId = '$sessionMemberId'";
    $result = $connect -> query($sql);

    if($result -> num_rows == 0){
        $jsonResult = "bad";
    } else {
        // $updateSql = "UPDATE boardComment SET commentMsg = '$commentMsg' WHERE commentId = '$commentId'";
        $updateSql = "UPDATE boardComment SET commentMsg = '$commentMsg' WHERE commentId = '$commentId' AND memberId = '$sessionMemberId'";
        $connect -> query($updateSql);
        $jsonResult = "good";
    }

    echo json_encode(array("result" => $jsonResult));
?>