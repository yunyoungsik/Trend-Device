<?php
    include "../connect/connect.php";

    $memberID = $_POST['memberID'];
    $Birth = $_POST['Birth'];
    $ModifyeBirthPass = $_POST['ModifyeBirthPass'];

    $sql = "SELECT youPass FROM tdMembers WHERE memberID='$memberID'";
    
    $result = $connect -> query($sql);

    if($result -> num_rows == 0 ){
        $jsonResult = "bad";
    }else{
        $updatesql = "UPDATE tdMembers SET youBirth = '$Birth' WHERE memberID = '$memberID'";
        $connect -> query($updatesql);
        $jsonResult = "good";
    }
    echo json_encode(array("result" => $jsonResult));

?>