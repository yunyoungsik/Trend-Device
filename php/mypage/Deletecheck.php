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
                                <li><a href="passModify.php">비밀번호 변경</a></li>
                                <li class="active"><a href="memberDelete.php0">회원탈퇴</a></li>
                                
                            </ul>
                        </div> 
                    </div>
                    <!-- //mypage__menu -->

                    <div class="mypage__info">
                        <div class="mapageInfo__header">
                            <h2>회원탈퇴</h2>
                            <p>'네, 회원을 탈퇴합니다.'버튼을 누르면 다시 되돌릴 수 없습니다.<br>
                                그래도 회원을 탈퇴하겠습니까?
                            </p>
                        </div>
                        <!-- //mapageInfo__header -->

                        <div class="auth">
                                <div class="delete_btn">
                                    <button id="memberDeleteCancel" class="btn__style5"><a href="mypage.php">취소</a></button>
                                    <button id="memberDeleteButton" class="btn__style5"><a href="Delete.php">네, 회원을 탈퇴합니다.</a></button>
                                </div>
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
    
    </script>
</body>
</html>