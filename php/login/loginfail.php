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
                    <h2>로그인 실패</h2>
                </div>
                <!-- //findResult__title -->

                <div class="find__resultBox">
                    <p>이메일 혹은 암호가 맞지 않습니다.<br> 다시 시도해주세요.</p>
                </div>
                <!-- //find__resultBox -->

                <div class="button__box">
                    <a href="../main/main.php" class="btn__style3 login__btn">메인</a>
                    <a href="login.php" class="btn__style3">로그인</a>
                </div>
                <!-- //button__box -->

                <div class="span__box">
                    <div class="passwordfind"><a href="PWreset.php">암호를 잊었습니까?</a></div>
                    <div class="joinclub">아직 계정이 없나요?<a href="../join/join.php">회원가입</a></div>
                </div>

            </div>
            <!-- //find__result -->
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