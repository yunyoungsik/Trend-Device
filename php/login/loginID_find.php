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
        <?php include "../include/header.php"?>
        <!-- //header -->
        
        <?php include "../include/nav.php"?>
        <!-- //nav -->


        <main id="main">
            <div class="find__inner container2">
                <div class="find__contents">
                    <h2>아이디 찾기</h2>

                    <div class="find__form">
                        <form action="IDfind_success.php" name="IDfind_success" method="post">
                            <fieldset>
                                <legend class="blind">아이디 찾기 영역</legend>
                                <div class="find__name">
                                    <label for="youName" class="required">이름</label>
                                    <input type="text" id="youName" name="youName" placeholder="이름을 입력해주세요." class="input__style" required>
                                </div>
                                <div class="find__phone">
                                    <label for="youPhone" class="required">전화번호</label>
                                    <input type="text" id="youPhone" name="youPhone" placeholder="전화번호를 입력해주세요." class="input__style" required>
                                </div>
                                <button type="submit" class="btn__style3">계속</button>
                            </fieldset>
                        </form>
                    </div>
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
