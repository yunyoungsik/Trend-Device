<?php
    include "../connect/connect.php";
    include "../connect/session.php";
//     echo"<pre>";
//     var_dump($_SESSION);
//     echo"</pre>";
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
            <div class="join__result container3">
                <div class="joinResult__title">
                    <h2>회원가입 완료</h2>
                </div>
                <div class="join__resultBox">
                    <!-- <img src="../../assets/img/icon__success.png" alt="회원가입 성공"> -->
                    <p>회원가입이 정상적으로 완료되었습니다.<br>회원이 되신걸 환영합니다.</p>
                </div>
                <a href="../main/main.php" class="btn__style3 main__btn">메인</a>
                <a href="../login/login.php" class="btn__style3">로그인</a>
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