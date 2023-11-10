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
            background-color: #fff;
        }
        @media (max-width: 1300px) {
            .find__resultBox img {
                display: none;

            }
        }
        .button__box {
            display: flex;
            /* align-items: center; */
            justify-content: center;
        }
        .span__box {
            color: #2079D3;
            font-size: 14px;
        }
        .span__box div {
            margin-top: 5px;
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
            <div class="find__result container3">
                <div class="findResult__title">
                    <h2>인증 실패</h2>
                </div>
                <!-- //findResult__title -->

                <div class="find__resultBox">
                    <img src="../../assets/img/failicon.png" alt="인증 실패">
                    <p>암호가 맞지 않습니다.<br> 다시 시도해주세요.</p>
                </div>
                <!-- //find__resultBox -->

                <div class="button__box">
                    <a href="../main/main.php" class="btn__style3 login__btn">메인</a>
                    <a href="../mypage/mypage.php" class="btn__style3 login__btn">마이페이지</a>
                </div>
                <!-- //button__box -->

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