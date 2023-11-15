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

    $memberId =  $_SESSION['memberID'];
    $boardAuthor = $_SESSION['youName'];

    $pCategory = $_POST['phone_select2'];
    
    $boardCategory = $_POST['boardCategory'];
    $boardTitle = $_POST['boardTitle'];
    $boardTitle2 = $_POST['boardTitle2'];
    $boardContents = nl2br($_POST['boardContents']);

    $boardView = 0;
    $boardLike = 0;
    $boardRegTime = time();
    $boardDelete = 1;

    $boardFile = $_FILES['boardFile'];
    $boardImgSize = $_FILES['boardFile']['size'];
    $boardImgType = $_FILES['boardFile']['type'];
    $boardImgName = $_FILES['boardFile']['name'];
    $boardImgTmp = $_FILES['boardFile']['tmp_name'];

    $boardTitleLen = strlen($boardTitle);
    $boardContentsLen = strlen($boardContents);

    // echo "<pre>";
    // var_dump($boardFile);
    // echo "</pre>";
    
    if($boardContentsLen === 0 || $boardTitleLen === 0){
        echo "<script>alert('게시글 제목과 내용에 글을 써주세요.')</script>";
        echo "<script>window.history.back()</script>";
        return false;
    } else {   
        if($boardTitle2){
            if($boardImgType){
                $fileTypeExtension = explode("/", $boardImgType);
                $fileType = $fileTypeExtension[0];  //image
                $fileExtension = $fileTypeExtension[1];  //jpeg
    
                // 이미지 타입 확인
                if($fileType === "image"){
                    if($fileExtension === "jpg" || $fileExtension === "jpeg" || $fileExtension === "png" || $fileExtension === "gif" || $fileExtension === "webp"){
                        $boardImgDir = "../../assets/boardimg/";
                        $boardImgName = "Img_".time().rand(1, 99999)."."."{$fileExtension}";
                        $sql = "INSERT INTO FBoard(memberID, fTitle, fContents, fCategory, fAuthor, fRegTime, fView, fLike, fImgFile, fImgSize, fDelete) VALUES('$memberId', '$boardTitle VS $boardTitle2',  '$boardContents', '$boardCategory', '$boardAuthor', '$boardRegTime', '$boardView', '$boardLike', '$boardImgName', '$boardImgSize', '$boardDelete');";
                        $result = move_uploaded_file($boardImgTmp, $boardImgDir.$boardImgName);
                    } else {
                        echo "<script>alert('이미지 파일 형식이 아닙니다.')</script>";
                    }
                } else {
                    echo "<script>alert('이미지 파일이 아닙니다.')</script>";
                }
            } else {
                $sql = "INSERT INTO FBoard(memberID, fTitle, fContents, fCategory, fAuthor, fRegTime, fView, fLike, fImgFile, fImgSize, fDelete) VALUES('$memberId', '$boardTitle VS $boardTitle2', '$boardContents', '$boardCategory', '$boardAuthor', '$boardRegTime', '$boardView', '$boardLike', 'Img_default.jpg', '$boardImgSize', '$boardDelete');";
            }
        } else {
            if($boardImgType){
                $fileTypeExtension = explode("/", $boardImgType);
                $fileType = $fileTypeExtension[0];  //image
                $fileExtension = $fileTypeExtension[1];  //jpeg
    
                // 이미지 타입 확인
                if($fileType === "image"){
                    if($fileExtension === "jpg" || $fileExtension === "jpeg" || $fileExtension === "png" || $fileExtension === "gif" || $fileExtension === "webp"){
                        $boardImgDir = "../../assets/boardimg/";
                        $boardImgName = "Img_".time().rand(1, 99999)."."."{$fileExtension}";
                        $sql = "INSERT INTO FBoard(memberID, fTitle, fContents, fCategory, fAuthor, fRegTime, fView, fLike, fImgFile, fImgSize, fDelete) VALUES('$memberId', '$boardTitle',  '$boardContents', '$boardCategory', '$boardAuthor', '$boardRegTime', '$boardView', '$boardLike', '$boardImgName', '$boardImgSize', '$boardDelete');";
                        $result = move_uploaded_file($boardImgTmp, $boardImgDir.$boardImgName);
                    } else {
                        echo "<script>alert('이미지 파일 형식이 아닙니다.')</script>";
                    }
                } else {
                    echo "<script>alert('이미지 파일이 아닙니다.')</script>";
                }
            } else {
                $sql = "INSERT INTO FBoard(memberID, fTitle, fContents, fCategory, fAuthor, fRegTime, fView, fLike, fImgFile, fImgSize, fDelete) VALUES('$memberId', '$boardTitle', '$boardContents', '$boardCategory', '$boardAuthor', '$boardRegTime', '$boardView', '$boardLike', 'Img_default.jpg', '$boardImgSize', '$boardDelete');";
            }
        }
    }
    // 이미지 사이즈 확인
    if($boardImgSize > 10000000){
        echo "<script>alert('이미지 파일 용량이 초과되었습니다. 최대 용량은 1MB입니다.')</script>";
    }

    $result = $connect -> query($sql);

    if($result){
        echo "<script>alert('저장이 완료되었습니다.')</script>";
        echo "<script>window.location.href = 'boardCate.php?category=$boardCategory';</script>";
    } else {
        echo "<script>alert('저장에 실패하였습니다..')</script>";
        echo "<script>window.location.href = 'boardCate.php?category=$boardCategory';</script>";
    }
?>
</body>
</html>