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
                    <h2>비밀번호 찾기</h2>
                    <div class="find__form">
                        <form action="PWfind_success.php" name="PWfind_success" method="post">
                            <fieldset>
                                <legend class="blind">비밀번호 찾기 영역</legend>
                                <div>
                                    <label for="youEmail" class="required">이메일</label>
                                    <input type="text" id="youEmail" name="youEmail" placeholder="이메일을 입력해주세요!" class="input__style" required>
                                </div>
                                <div>
                                    <label for="youBirth" class="required">생년월일</label>
                                    <input type="text" id="youBirth" name="youBirth" placeholder="생년월일을 입력해주세요!" class="input__style" required>
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