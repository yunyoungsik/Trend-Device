<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    include "../connect/connect.php";
    include "../connect/session.php";

    // $memberId =  $_SESSION['memberId'];
    // $boardAuthor = $_SESSION['youName'];
    $memberId = 0;
    
    $pCategory = $_POST['pCategory'];
    $pEvent = $_POST['pEvent'];
    $pTitle = $_POST['pTitle'];
    $pDesc = nl2br($_POST['pDesc']);
    $pLink = $_POST['pLink'];
    $pPrice = $_POST['pPrice'];
    $pProcess = $_POST['pProcess'];
    $pCore = $_POST['pCore'];
    $pDisplaySize = $_POST['pDisplaySize'];
    $pMaterial = $_POST['pMaterial'];
    $pSize = $_POST['pSize'];
    $pWeight = $_POST['pWeight'];
    $pCamera = $_POST['pCamera'];
    $pBattery = $_POST['pBattery'];
    $pUsb = $_POST['pUsb'];
    $pColor = $_POST['pColor'];
    $pVolume = $_POST['pVolume'];


    $pRegTime = time();
    $pDelete = 1;

    $pImgFile = $_FILES['pImgFile'];
    $pImgSize = $_FILES['pImgFile']['size'];
    $pImgType = $_FILES['pImgFile']['type'];
    $pImgName = $_FILES['pImgFile']['name'];
    $pImgTmp = $_FILES['pImgFile']['tmp_name'];

    // echo "<pre>";
    // var_dump($noticeFile);
    // echo "</pre>";


    if($pImgType){
        $fileTypeExtension = explode("/", $pImgType);
        $fileType = $fileTypeExtension[0];  //image
        $fileExtension = $fileTypeExtension[1];  //jpeg

        // 이미지 타입 확인
        if($fileType === "image"){
            if($fileExtension === "jpg" || $fileExtension === "jpeg" || $fileExtension === "png" || $fileExtension === "gif" || $fileExtension === "webp"){
                $pImgDir = "../../assets/phoneimg/";
                $pImgName = "Img_".time().rand(1, 99999)."."."{$fileExtension}";
                $sql = "INSERT INTO Phone(pCategory, pEvent, pTitle, pDesc, pLink, pPrice, pProcess, pCore, pDisplaySize, pMaterial, pSize, pWeight, pCamera, pBattery, pUsb, pColor, pVolume, pRegTime, pImgFile, pImgSize, pDelete)
                VALUES('$pCategory', '$pEvent', '$pTitle', '$pDesc', '$pLink', '$pPrice', '$pProcess', '$pCore', '$pDisplaySize', '$pMaterial', '$pSize', '$pWeight', '$pCamera', '$pBattery', '$pUsb', '$pColor', '$pVolume', '$pRegTime', '$pImgName', '$pImgSize', '$pDelete');";
                echo $sql;
                $result = move_uploaded_file($pImgTmp, $pImgDir.$pImgName);
            } else {
                echo "<script>alert('이미지 파일 형식이 아닙니다.')</script>";
            }
            echo "<script>alert('이미지 파일 형식이 맞습니다.')</script>";
        } else {
            echo "<script>alert('이미지 파일이 아닙니다.')</script>";
        }
    } else {
        $sql = "INSERT INTO Phone(pCategory, pEvent, pTitle, pDesc, pLink, pPrice, pProcess, pCore, pDisplaySize, pMaterial, pSize, pWeight, pCamera, pBattery, pUsb, pColor, pVolume, pRegTime, pImgFile, pImgSize, pDelete)
                VALUES('$pCategory', '$pEvent', '$pTitle', '$pDesc', '$pLink', '$pPrice', '$pProcess', '$pCore', '$pDisplaySize', '$pMaterial', '$pSize', '$pWeight', '$pCamera', '$pBattery', '$pUsb', '$pColor', '$pVolume', '$pRegTime', 'Img_default.jpg', '$pImgSize', '$pDelete');";
    }

    // 이미지 사이즈 확인
    if($pImgSize > 10000000){
        echo "<script>alert('이미지 파일 용량이 초과되었습니다. 최대 용량은 1MB입니다.')</script>";
    }

    $result = $connect -> query($sql);

    if($result){
        echo "<script>alert('저장이 완료되었습니다.')</script>";
        echo "<script>window.location.href = 'phone.php';</script>";
    }
?>
</body>
</html>