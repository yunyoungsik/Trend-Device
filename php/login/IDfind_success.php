<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $youName = mysqli_real_escape_string($connect, $_POST['youName']);
        $youPhone = mysqli_real_escape_string($connect, $_POST['youPhone']);

        $sql = "SELECT * FROM tdMembers WHERE youName = '$youName' AND youPhone = '$youPhone'";
        $result = $connect->query($sql);

        if ($result && $result->num_rows > 0) {
            // 아이디가 일치하는 회원이 있다면
            $row = $result->fetch_assoc();
            $foundId = $row['youEmail'];
        } else {
            echo "<script>
                alert('일치하는 정보가 없습니다.');
                location.href = 'loginID_find.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trend Device</title>

    <!-- css -->
    <?php include "../include/head.php"?>
</head>
<body>
    <div id="wrap">
        <?php include "../include/header.php"?>
        <!-- //header -->
        
        <?php include "../include/nav.php"?>
        <!-- //nav -->

        
        <main id="main">
            <div class="find__result container3">
                <div class="findResult__title">
                    <h2>아이디 찾기</h2>
                </div>
                <div class="find__resultBox">
                    <p id="find_msg">찾으시는 아이디는 [ <i><?=$foundId?></i> ] 입니다.</p>
                </div>
                <div class="button__box">
                    <a href="../main/main.php" class="btn__style3">메인</a>
                    <a href="login.php" class="btn__style3 login__btn">로그인</a>
                </div>
            </div>
        </main>
        <!-- //main -->

        <?php include "../include/footer.php" ?>
        <!-- //footer -->
    </div>
    <!-- //wrap -->

    <!-- script -->
    <script src="../assets/script/script.js"></script>
</body>
</html>