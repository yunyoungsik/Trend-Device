<?php 
    include "../connect/connect.php";
    include "../connect/session.php";

    $memberID = $_SESSION['memberID'];
    $listId = $_POST['listId'];

    $updateSql = "DELETE FROM LikedPosts WHERE memberId = '$memberID' AND phoneId = '$listId'";
    $connect -> query($updateSql);
    $jsonResult = "good";

    echo json_encode(array("result" => $jsonResult));
?>