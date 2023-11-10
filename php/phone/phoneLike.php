<?php 
    include "../connect/connect.php";
    include "../connect/session.php";

    if(isset($_POST['phoneId'])){
        $phoneId = $_POST['phoneId'];
        $category = $_POST['category'];

        // 사용자 인증 확인
        if(isset($_SESSION['memberID'])){
            $memberId = $_SESSION['memberID'];

            // 공감 여부 확인
            $checkLikeSql = "SELECT * FROM LikedPosts WHERE memberId = '$memberId' AND phoneId = '$phoneId'";
            $checkLikeResult = $connect->query($checkLikeSql);

            if($checkLikeResult->num_rows > 0){
                // 이미 공감한 경우
                echo json_encode(["info" => "alreadyLiked"]);
            } else {
                // 공감한 경우, LikedPosts 테이블에 기록 추가
                $insertLikeSql = "INSERT INTO LikedPosts (memberId, phoneId, likeCategory) VALUES ('$memberId', '$phoneId', '$category')";
                $connect->query($insertLikeSql);

                echo json_encode(["info" => "success"]);
            }
        } else {
            // 로그인하지 않은 경우
            echo json_encode(["info" => "loginRequired"]);
        }
    }
?>