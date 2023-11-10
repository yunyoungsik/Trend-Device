<?php
    include "../connect/connect.php";

    $memberID = $_POST['memberID'];
    $firstName = $_POST['firstName'];
    $nextName =  $_POST['nextName'];
    $ModifyeNamePass = $_POST['ModifyeNamePass'];

    $sql = "SELECT youPass FROM tdMembers WHERE youPass = '$ModifyeNamePass' AND memberID='$memberID'";
    $result = $connect -> query($sql);

    if($result -> num_rows == 0 ){
        $jsonResult = "bad";
    }else{
        $updatename = $firstName . $nextName;
        $updatesql = "UPDATE tdMembers SET youName = '$updatename' WHERE memberID = '$memberID' AND youPass ='$ModifyeNamePass'";
        $connect -> query($updatesql);
        $jsonResult = "good";
        session_start();
        $_SESSION['youName'] = $updatename;
    }
    echo json_encode(array("result" => $jsonResult));

?>