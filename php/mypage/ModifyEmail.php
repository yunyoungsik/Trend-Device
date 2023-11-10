<?php
    include "../connect/connect.php";

    $memberID = $_POST['memberID'];
    $newEmail = $_POST['newEmail'];
    $ModifyeEmailPass = $_POST['ModifyeEmailPass'];

    $sql = "SELECT youPass FROM tdMembers WHERE youPass = '$ModifyeEmailPass' AND memberID='$memberID'";
    $result = $connect -> query($sql);

    if($result -> num_rows == 0 ){
        $jsonResult = "bad";
    }else{
        $updatesql = "UPDATE tdMembers SET youEmail = '$newEmail' WHERE memberID = '$memberID' AND youPass ='$ModifyeEmailPass'";
        $connect -> query($updatesql);
        $jsonResult = "good";
        session_start();
        $_SESSION['youEmail'] = $newEmail;
    }
    echo json_encode(array("result" => $jsonResult));

?>