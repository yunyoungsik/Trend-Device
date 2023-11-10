<?php 
    include "../connect/connect.php";
    include "../connect/session.php";

    if(isset($_POST['blogId'])){
        $blogId = $_POST['blogId'];
        $category = $_POST['category'];

        // 사용자 인증 확인
        if(isset($_SESSION['memberID'])){
            $memberId = $_SESSION['memberID'];

            // 공감 여부 확인
            $checkLikeSql = "SELECT * FROM LikedPosts WHERE memberId = '$memberId' AND blogId = '$blogId'";
            $checkLikeResult = $connect->query($checkLikeSql);

            if($checkLikeResult->num_rows > 0){
                // 이미 공감한 경우 공감 취소
                $unlikeSql = "UPDATE FBoard SET fLike = fLike - 1 WHERE blogId = '$blogId'";
                $connect->query($unlikeSql);
                $deleteLikeSql = "DELETE FROM LikedPosts WHERE memberId = '$memberId' AND blogId = '$blogId'";
                $connect->query($deleteLikeSql);

                echo json_encode(["info" => "unliked"]);
            } else {
                // 공감 업데이트
                $updateLikeSql = "UPDATE FBoard SET fLike = fLike + 1 WHERE blogId = '$blogId'";
                $result = $connect->query($updateLikeSql);

                if($result){
                    // 공감한 경우, LikedPosts 테이블에 기록 추가
                    $insertLikeSql = "INSERT INTO LikedPosts (memberId, blogId, likeCategory) VALUES ('$memberId', '$blogId', '$category')";
                    $connect->query($insertLikeSql);

                    echo json_encode(["info" => "success"]);
                } else {
                    echo json_encode(["info" => "error"]);
                }
            }
        } else {
            // 로그인하지 않은 경우
            echo json_encode(["info" => "loginRequired"]);
        }
    }
?>