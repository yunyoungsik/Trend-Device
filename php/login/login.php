<?php
    include "../connect/connect.php";
    // include "../connect/session.php";

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
        /* main */
        #main {
            width: 100%;
            height: 90%;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div id="wrap">
        <?php include "../include/header.php"?>
        <!-- //header -->
        
        <?php include "../include/nav.php"?>
        <!-- //nav -->

        <main id="main">
            <div class="login__inner container2">
                <div class="login__title">
                    <h2>Trend Device 커뮤니티에 로그인하기</h2>
                </div>
                <div class="login__form">
                    <form action="loginSave.php" name="lobinSave" method="post">
                        <fieldset>
                            <legend class="blind">로그인 영역</legend>
                            <div>
                                <label for="youEmail" class="required blind">이메일</label>
                                <input type="email" id="youEmail" name="youEmail" placeholder="이메일" class="input__style2" required>
                            </div>
                            <div>
                                <label for="youPass" class="required blind">비밀번호</label>
                                <input type="password" id="youPass" name="youPass" placeholder="비밀번호" class="input__style3" autocomplete="off" required>
                            </div>
                            <button type="submit" class="btn__style3">로그인</button>
                        </fieldset>
                    </form>
                </div>
                <!-- <div class="login__check">
                    <input type="checkbox"> 아이디 저장
                </div> -->
                <div class="login__support">
                    <ul>
                        <li><a href="loginPW_find.php">암호를 잊었습니까?</a></li>
                        <li>아직 계정이 없나요? <a href="../join/join.php">회원가입</a></li>
                    </ul>
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