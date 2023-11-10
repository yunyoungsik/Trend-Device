<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    // 세션정보
    $memberID = $_SESSION['memberID'];
    $youName = $_SESSION['youName'];

    // 멤버정보
    $membersql = "SELECT * FROM tdMembers WHERE memberID = '$memberID'";
    $memberresult = $connect -> query($membersql);
    $membersInfo = $memberresult -> fetch_array(MYSQLI_ASSOC);

    // 멤버 이미지 정보
    $imgsql = "SELECT youImgFile FROM tdMembers WHERE memberID = '$memberID'";
    $imgresult = $connect -> query($imgsql);

    if($imgresult -> num_rows > 0){
        // $row = $result -> fetch_assoc();
        $youImgFile = $row['youImgFile'];
    }else{
        $youImgFile = "../../assets/img/icon__profile.png";
    }

    // 비밀번호 확인
    $passsql = "SELECT youPass FROM tdMembers WHERE memberID = '$memberID'";
    $passresult = $connect -> query($passsql);
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
            height: 90vh;
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
            <div class="mypage__inner container2">
                <div class="mypage__contents">
                    <div class="mypage__menu">
                        <div class="mypageMenu__header">
                            <img src="../../assets/memberimg/<?= !empty($membersInfo['youImgFile']) ? $membersInfo['youImgFile'] : 'icon__profile.png' ?>" alt="<?= $membersInfo['youName']?>의 프로필">   
                            <h2><?= $youName ?></h2>
                            <p><?= $membersInfo['youEmail']?></p>
                        </div>
                        <div class="mypageMenu__footer">
                            <ul>
                                <li><a href="mypage.php" >개인정보</a></li>
                                <!-- <li><a href="myinfo.php">개인정보 관리</a></li> -->
                                <li class="active"><a href="passModify.php">비밀번호 변경</a></li>
                                <li><a href="memberDelete.php">회원탈퇴</a></li>
                            </ul>
                        </div> 
                    </div>
                    <!-- //mypage__menu -->

                    <div class="mypage__info">
                        <div class="mapageInfo__header">
                            <h2>비밀번호 변경</h2>
                            <p>인증되었습니다. 새비밀번호를 입력해주세요.</p>
                        </div>
                        <!-- //mapageInfo__header -->

                        <div class="auth">
                            <form action="PassModifysuccess.php" name="PassModifysuccess" method="POST">
                                <fieldset>
                                    <label for="newPass" class="blind">새로운 비밀번호</label>
                                    <input type="password" id="newPass" name="newPass" placeholder="변경할 비밀번호 입력해주세요">
                                    <p class="msg" id="newPassMsg"></p>
                                    <label for="newPassC" class="blind">새로운 비밀번호 확인</label>
                                    <input type="password" id="newPassC" name="newPassC" placeholder="비밀번호를 다시 입력해주세요">
                                    <p class="msg" id="newPassCMsg"></p>
                                    <button type="submit" class="btn__style3">비밀번호 바꾸기</button>
                                </fieldset>
                            </form>
                            <!-- //form -->
                        </div>
                        <!-- //auth -->
                    </div>
                    <!-- //mypage__info -->
                </div>
                <!-- //mypage__contents -->
            </div>
            <!-- //mypage__inner -->
        </main>
        <!-- //main -->

        

        <?php include "../include/footer.php" ?>
        <!-- //footer -->
    </div>
    <!-- //wrap -->

    <!-- script -->
    <script src="../assets/script/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        // 비밀번호 유효성 검사
        if($("#newPass").val() == ''){
            $("#newPassMsg").text("이름을 입력해주세요.");
            $("#newPass").focus();
            return false;
        } else {
            let getYouPass = $("#newPass").val();
            let getYouPassNum = getYouPass.search(/[0-9]/g);
            let getYouPassEng = getYouPass.search(/[a-z]/ig);
            let getYouPassSpe = getYouPass.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

            if(getYouPass.length < 8 || getYouPass.length > 20){
                $("#newPassMsg").text("8자리 ~ 20자리 이내로 입력해주세요.");
                $("#youPass").focus();
                return false;
            } else if (getYouPass.search(/\s/) != -1){
                $("#newPassMsg").text("비밀번호는 공백없이 입력해주세요.");
                $("#youPass").focus();
                return false;
            } else if (getYouPassNum < 0 || getYouPassEng < 0 || getYouPassSpe < 0 ){
                $("#newPassMsg").text("영문, 숫자, 특수문자를 혼합하여 입력해주세요.");
                $("#youPass").focus();
                return false;
            } 
        }

        // 비밀번호 확인 유효성 검사
        if($("#youPassC").val() == ''){
            $("#newPassCMsg").text("비밀번호를 입력해주세요.");
            $("#youPassC").focus();
            return false;
        }

        // 비밀번호 동일한지 체크
        if($("#youPass").val() !== $("#youPassC").val()){
            $("#newPassCMsg").text("비밀번호가 일치하지 않습니다.");
            $("#youPass").focus();
            return false;
        }



    </script>
</body>
</html>