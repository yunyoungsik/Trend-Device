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
    <style>

    </style>
</head>

<body>
    <div id="wrap">

        <!-- <div class="mouse__cursor none"></div> -->
        <?php include "../include/header.php"?>
        <!-- //header -->
        
        <?php include "../include/nav.php"?>
        <!-- //nav -->



        <main id="main">
            <?php include "../include/slider.php" ?>
            <!-- //slider -->
            <?php include "../include/gsap.php" ?>
            <!-- //gsap -->

            <div class="intro__inner container">
                <div class="intro__header">
                    <h2>Trend Device를 소개합니다.</h2>
                    <p>
                        Trend Device는 소비자들이 다양한 스마트폰 모델을 비교하고 최적의 선택을 할 수 있도록 도와주는 웹 사이트입니다.<br>
                        휴대폰 모델, 기능, 가격, 성능, 디자인 등과 같은 다양한 요소를 비교하고 평가해보세요!
                    </p>
                </div>
                <!-- //intro__header -->

                <div class="intro__images">
                    <div class="intro__img">
                        <img src="../../assets/img/icon__compare.png" alt="스마트폰 비교하기">
                        <span>비교하기</span>
                    </div>
                    <div class="intro__img">
                        <a href="../join/join.php"><img src="../../assets/img/icon__join.png" alt="회원가입"></a>
                        <span><a href="../join/join.php">회원가입</a></span>
                    </div>
                    <div class="intro__img">
                        <img src="../../assets/img/icon__comunity.png" alt="커뮤니티">
                        <span>커뮤니티</span>
                    </div>
                </div>
                <!-- //intro__img -->

                <div class="intro__footer">
                    <span>이미 회원이신가요?</span>
                    <div class="intro__btn">
                        <a href="../login/login.php">로그인</a>
                    </div>
                </div>
                <!-- //intro__footer -->
            </div>

        </main>
        <!-- //main -->

        <?php include "../include/footer.php" ?>
        <!-- //footer -->

    </div>
    <!-- //wrap -->
</body>

</html>