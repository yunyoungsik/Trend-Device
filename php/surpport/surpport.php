<?php
    include "../connect/connect.php";
    include "../connect/session.php";
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
        <?php include "../include/header.php" ?>
        <!-- //header -->
        
        <?php include "../include/nav.php" ?>
        <!-- //nav -->

        <main id="main">
            <div class="support__inner container">
                <div class="support__left">
                    <h2>Trend Device에 궁금하신 점이있으신가요?</h2>
                    <div class="support__left_bt">
                        <p><strong>email</strong>info@trenddevice.com</p>
                        <p><strong>tel</strong>070.1234.1234</p>
                        <p><strong>address</strong>경기도 안산시 단원구 고잔2길 45 코스모프라자 6층</p>
                    </div>
                </div>
                <div class="support__right">
                    <form action="surpportMail.php" name="surpportMail" method="post">
                        <fieldset>
                            <legend class="blind">게시글 작성하기</legend>
                            <div class="sup__idTitle">
                                <label for="supId" class="required">아이디</label>
                                <div class="sup__idTitle__input">
                                    <div class="sup__input">
                                        <input type="text" id="supId" name="supId" class="input__style" placeholder="아이디를 입력해주세요.">
                                    </div>
                                </div>
                            </div>
                            <div class="sup__cartegory">
                                <label for="supCartegory" class="required">문의사항 카테고리</label>
                                <div class="sup__input">
                                    <input type="text" id="supCartegory" name="supCartegory" class="input__style" placeholder="문의사항 카테고리를 입력해주세요.">
                                </div>
                            </div>
                            <div class="sup__Cont">
                                <label for="supContents" class="required">내용</label>

                                <div class="sup__texarea">
                                    <textarea name="supContents" id="supContents" rows="20" class="input__style"></textarea>
                                </div>
                            </div>
                            <div class="board__btns">
                                <button type="submit" class="btn__style save">문의하기</button>
                            </div>
                        </fieldset>
                    </form>
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