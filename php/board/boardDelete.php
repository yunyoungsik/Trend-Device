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

    $boardID = $_GET['blogId'];
    $category = $_GET['category'];
    $memberID = $_SESSION['memberID'];

    // 게시글 소유자 확인
    $sql = "SELECT * FROM FBoard WHERE blogId = '$boardID'";
    $result = $connect -> query($sql);

    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        $boardOwnerID = $info['memberID'];

        // 로그인 memberID와 게시글의 memberID 일치 여부
        if($memberID == $boardOwnerID){
            $sql = "DELETE FROM FBoard WHERE blogId = '$boardID'";
            $connect -> query($sql);
            echo "<script>alert('게시글이 삭제되었습니다.');</script>";
            echo "<script>window.location.href = 'boardCate.php?category=$category';</script>";
        } else {
            echo "<script>alert('게시글 소유자만 삭제 할 수 있습니다.')</script>;";
            echo "<script>window.history.back();</script>";
        }
    } else {
        echo "<script>alert('관리자에게 문의해주세요!');</script>";
    }
?>
</body>
</html>