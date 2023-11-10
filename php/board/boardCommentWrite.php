<?php 
    include "../connect/connect.php";
    include "../connect/session.php";

    $blogId = $_POST['blogId'];
    $memberId = $_POST['memberId'];
    $commentName = $_POST['name'];
    $commentPass = $_POST['pass'];
    $commentWrite = $_POST['msg'];
    $regTime = time();

    $sql =  $sql = "INSERT INTO boardComment(memberId, boardId, commentName, commentPass, commentMsg, commentDelete, regTime) VALUES('$memberId', '$blogId', '$commentName', '$commentPass', '$commentWrite', '1', '$regTime')";
    $result = $connect -> query($sql);

    echo json_encode(array("info" => $blogId));
?>  