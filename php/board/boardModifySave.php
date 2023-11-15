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

        $boardId = $_POST['boardId'];
        $boardCategory = $_POST['boardCategory'];
        $boardTitle = $_POST['boardTitle'];
        $boardTitle2 = $_POST['boardTitle2'];
        $boardContents = $_POST['boardContents'];
        $memberID = $_SESSION['memberID'];

        $boardFile = $_FILES['boardFile'];
        $boardImgSize = $_FILES['boardFile']['size'];
        $boardImgType = $_FILES['boardFile']['type'];
        $boardImgName = $_FILES['boardFile']['name'];
        $boardImgTmp = $_FILES['boardFile']['tmp_name'];

        $boardTitle = $connect -> real_escape_string($boardTitle);
        $boardContents = $connect -> real_escape_string($boardContents);

        // echo $boardId, $boardTitle, $boardContents, $memberId;


        // 이미지 수정
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
                        $sql = "UPDATE FBoard SET fTitle = '$boardTitle VS $boardTitle2', fContents = '$boardContents', fCategory = '$boardCategory', fImgFile = '$boardImgName', fImgSize = '$boardImgSize' WHERE blogId = '$boardId'";
                        $result = move_uploaded_file($boardImgTmp, $boardImgDir.$boardImgName);
                    } else {
                        echo "<script>alert('이미지 파일 형식이 아닙니다.')</script>";
                    }
                    echo "<script>alert('이미지 파일 형식이 맞습니다.')</script>";
                }
            } else {
                $sql = "UPDATE FBoard SET fTitle = '$boardTitle VS $boardTitle2', fContents = '$boardContents', fCategory = '$boardCategory' WHERE blogId = '$boardId'";
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
                        $sql = "UPDATE FBoard SET fTitle = '$boardTitle', fContents = '$boardContents', fCategory = '$boardCategory', fImgFile = '$boardImgName', fImgSize = '$boardImgSize' WHERE blogId = '$boardId'";
                        $result = move_uploaded_file($boardImgTmp, $boardImgDir.$boardImgName);
                    } else {
                        echo "<script>alert('이미지 파일 형식이 아닙니다.')</script>";
                    }
                    echo "<script>alert('이미지 파일 형식이 맞습니다.')</script>";
                }
            } else {
                $sql = "UPDATE FBoard SET fTitle = '$boardTitle', fContents = '$boardContents', fCategory = '$boardCategory' WHERE blogId = '$boardId'";
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
            echo "<script>window.location.href = 'boardCate.php?category=$boardCategory';</script>";
        }

        
        // if ($connect->query($sql)) {
        //     echo "<script>alert('게시글이 수정되었습니다.')</script>";
        //     echo '<script>window.location.href = "boardView.php";</script>';
        // } else {
        //     echo "<script>alert('게시글 수정에 실패했습니다.')</script>";
        // }
    ?>
</body>
</html>