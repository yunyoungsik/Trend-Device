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

    $memberID =  $_SESSION['memberID'];
    $nAuthor = $_SESSION['youName'];
    
    $noticeCategory = $_POST['noticeCategory'];
    $noticeTitle = $_POST['noticeTitle'];
    $noticeContents = nl2br($_POST['noticeContents']);

    $noticeView = 0;
    $noticeLike = 0;
    $noticeRegTime = time();
    $noticeDelete = 1;

    $noticeFile = $_FILES['noticeFile'];
    $noticeImgSize = $_FILES['noticeFile']['size'];
    $noticeImgType = $_FILES['noticeFile']['type'];
    $noticeImgName = $_FILES['noticeFile']['name'];
    $noticeImgTmp = $_FILES['noticeFile']['tmp_name'];

    // echo "<pre>";
    // var_dump($noticeFile);
    // echo "</pre>";
    $noticeTitleLen = strlen($noticeTitle);
    $noticeContentsLen = strlen($noticeContents);

    // echo "<pre>";
    // var_dump($boardFile);
    // echo "</pre>";
    
    if($noticeTitleLen === 0 || $noticeContentsLen === 0){
        echo "<script>alert('게시글 제목과 내용에 글을 써주세요.')</script>";
        echo "<script>window.history.back()</script>";
        return false;
    } else {
        if($noticeImgType){
            $fileTypeExtension = explode("/", $noticeImgType);
            $fileType = $fileTypeExtension[0];  //image
            $fileExtension = $fileTypeExtension[1];  //jpeg

            // 이미지 타입 확인
            if($fileType === "image"){
                if($fileExtension === "jpg" || $fileExtension === "jpeg" || $fileExtension === "png" || $fileExtension === "gif" || $fileExtension === "webp"){
                    $noticeImgDir = "../../assets/boardimg/";
                    $noticeImgName = "Img_".time().rand(1, 99999)."."."{$fileExtension}";
                    $sql = "INSERT INTO NBoard(memberID, nTitle, nContents, nCategory, nAuthor, nRegTime, nView, nLike, nImgFile, nImgSize, nDelete) VALUES('$memberID', '$noticeTitle',  '$noticeContents', '$noticeCategory', '$nAuthor', '$noticeRegTime', '$noticeView', '$noticeLike', '$noticeImgName', '$noticeImgSize', '$noticeDelete');";
                    $result = move_uploaded_file($noticeImgTmp, $noticeImgDir.$noticeImgName);
                } else {
                    echo "<script>alert('이미지 파일 형식이 아닙니다.')</script>";
                }
                echo "<script>alert('이미지 파일 형식이 맞습니다.')</script>";
            } else {
                echo "<script>alert('이미지 파일이 아닙니다.')</script>";
            }
        } else {
            $sql = "INSERT INTO NBoard(memberID, nTitle, nContents, nCategory, nAuthor, nRegTime, nView, nLike, nImgFile, nImgSize, nDelete) VALUES('$memberID', '$noticeTitle', '$noticeContents', '$noticeCategory', '$nAuthor', '$noticeRegTime', '$noticeView', '$noticeLike', 'Img_default.jpg', '$noticeImgSize', '$noticeDelete');";
        }
    }
    // 이미지 사이즈 확인
    if($noticeImgSize > 10000000){
        echo "<script>alert('이미지 파일 용량이 초과되었습니다. 최대 용량은 1MB입니다.')</script>";
    }

    $result = $connect -> query($sql);

    if($result){
        echo "<script>alert('저장이 완료되었습니다.')</script>";
        echo "<script>window.location.href = 'notice.php';</script>";
    }
?>
</body>
</html>