<?php 
    include "../connect/connect.php";
    include "../connect/session.php";

    $memberId = $_SESSION['memberID'];
    $profile = $_FILES['profile'];
    $profileImgSize = $_FILES['profile']['size'];
    $profileImgType = $_FILES['profile']['type'];
    $profileImgName = $_FILES['profile']['name'];
    $profileImgTmp = $_FILES['profile']['tmp_name'];

    if($profile){  // 만약 profile에 데이터가 있으면
        $fileTypeExtension = explode("/", $profileImgType);  // /을 기준으로 데이터를 잘라냄
        $fileType = $fileTypeExtension[0];  // image
        $fileExtension = $fileTypeExtension[1]; // jpeg(확장자)
        
        // 이미지 타입 확인
        if($fileType === "image"){
            if($fileExtension === "jpg" || $fileExtension === "jpeg" || $fileExtension === "png" || $fileExtension === "gif" || $fileExtension === "webp"){
                $ImgDir = "../../assets/memberimg/";  // 이미지를 저장할 공간
                $ImgName = "Img_" . time() . rand(1, 99999) . "." . $fileExtension;
                $sql = "UPDATE tdMembers SET youImgFile='$ImgName', youImgSize='$profileImgSize' WHERE memberID = '$memberId'";              
            } else {
                // echo "<script>alert('이미지 파일 형식이 아닙니다.')</script>";
                $jsonResult = "bad";
            }
        } else {
            // echo "<script>alert('이미지 파일이 아닙니다.')</script>";
            $jsonResult = "bad";
        }
    } else {
        // echo "<script>alert('이미지 파일이 없습니다.')</script>";
        $jsonResult = "good";
        $sql = "UPDATE tdMembers SET youImgFile='Img_default.jpg', youImgSize='$profileImgSize' WHERE memberID = '$memberId'";
    }

    // 이미지 사이즈 확인
    if($profileImgSize > 1000000){
            $jsonResult = "bad";
            // echo "<script>alert('이미지 파일 용량이 1메가를 초과했습니다. 사이즈를 줄여주세요')</script>";   
    } else {
        $result = $connect->query($sql);
        $result = move_uploaded_file($profileImgTmp, $ImgDir.$ImgName);

        if($result){
            // echo "<script>alert('이미지 저장 완료')</script>";
            $jsonResult = "good";
        }
    }

    echo json_encode(array("result" => $jsonResult));   
?>


