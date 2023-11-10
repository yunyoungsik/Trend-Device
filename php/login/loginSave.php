<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    
    $youEmail = $_POST['youEmail'];
    $youPass = $_POST['youPass'];


    echo $youEmail;
    echo $youPass;

    $sql = "SELECT memberID, youEmail, youPass, youName FROM tdMembers WHERE youEmail = '$youEmail' AND youPass='$youPass'";
    $result = $connect -> query($sql);
    echo $sql;


    if($result){
        $count = $result -> num_rows;
        echo $count;
       if($count == 0){
        Header("Location: ../login/loginfail.php");
       }else{
        $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

        $_SESSION['memberID'] = $memberInfo['memberID'];
        $_SESSION['youEmail'] = $memberInfo['youEmail'];
        $_SESSION['youName'] = $memberInfo['youName'];
        Header("Location: ../main/main.php");
       }
    }
?>