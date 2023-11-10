<?php
    include "../connect/connect.php";

    $memberID = $_POST['memberID'];
    $newPhone = $_POST['newPhone'];
    $ModifyePhonePass = $_POST['ModifyePhonePass'];

    $sql = "SELECT youPass FROM tdMembers WHERE youPass = '$ModifyePhonePass' AND memberID='$memberID'";
    $result = $connect -> query($sql);

    if($result -> num_rows == 0 ){
        $jsonResult = "bad";
    }else{
        $updatesql = "UPDATE tdMembers SET youPhone = '$newPhone' WHERE memberID = '$memberID' AND youPass ='$ModifyePhonePass'";
        $connect -> query($updatesql);
        $jsonResult = "good";
    }
    echo json_encode(array("result" => $jsonResult));

?>