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
        $boardTitle = $_POST['boardTitle'];
        $boardContents = $_POST['boardContents'];
        $memberID = $_SESSION['memberID'];

        // echo $boardId, $boardTitle, $boardContents, $memberId;

        $boardTitle = $connect -> real_escape_string($boardTitle);
        $boardContents = $connect -> real_escape_string($boardContents);

        $sql = "UPDATE NBoard SET nTitle = '$boardTitle', nContents = '$boardContents' WHERE blogId = '$boardId'";
        if ($connect->query($sql)) {
            echo "<script>alert('게시글이 수정되었습니다.')</script>";
            echo '<script>window.location.href = "notice.php";</script>';
        } else {
            echo "<script>alert('게시글 수정에 실패했습니다.')</script>";
        }
    ?>
</body>
</html>