<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $youName = mysqli_real_escape_string($connect, $_POST['youName']);
    $youEmail = mysqli_real_escape_string($connect, $_POST['youEmail']);
    $youPass = mysqli_real_escape_string($connect, $_POST['youPass']);
    $youBirth = mysqli_real_escape_string($connect, $_POST['youBirth']);
    $youPhone = mysqli_real_escape_string($connect, $_POST['youPhone']);
    $youAddress1 = mysqli_real_escape_string($connect, $_POST['youAddress1']);
    $youAddress2 = mysqli_real_escape_string($connect, $_POST['youAddress2']);
    $youAddress3 = mysqli_real_escape_string($connect, $_POST['youAddress3']);
    $youAddress = $youAddress1 . " " . $youAddress2 . " " . $youAddress3;
    $regTime = time();

    $sql = "INSERT INTO tdMembers(youName, youEmail, youPass, youBirth, youPhone, youAddress, regTime) VALUES ('$youName', '$youEmail', '$youPass', '$youBirth', '$youPhone', '$youAddress', '$regTime')";
    $result = $connect -> query($sql);

    if($result){
        header("Location: joinSuccess.php");
        exit;
    } else {
        echo("에러발생3: 관리자에게 문의하세요!");
        exit;
    }
    
    // 데이터 베이스 연결 닫기
    mysqli_close($connect);
?>