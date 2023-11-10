<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    if(isset($_GET['phoneId'])){
        $phoneId = $_GET['phoneId'];
    } else {
        Header("Location: Phoned.php");
    }

    if(isset($_GET['category'])){
        $category = $_GET['category'];
    } else {
        $category = '상품게시판';
    }

    //상품 정보 가져오기
    $phoneSql = "SELECT * FROM Phone WHERE phoneId = '$phoneId'";
    $phoneResult = $connect -> query($phoneSql);
    $phoneInfo = $phoneResult -> fetch_array(MYSQLI_ASSOC);

    // 공감 상태 확인
    $likeStatus = "unliked";
    if(isset($_SESSION['memberID'])){
        $memberId = $_SESSION['memberID'];
        $checkLikeSql = "SELECT * FROM LikedPosts WHERE memberId = '$memberId' AND phoneId = '$phoneId'";
        $checkLikeResult = $connect->query($checkLikeSql);
        if($checkLikeResult->num_rows > 0){
            $likeStatus = "liked";
        }
    }
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
            <div class="phoneView__inner container">
                <div class="phoneView__top">
                    <div class="phoneView__top__left">
                        <img src="../../assets/phoneimg/<?=$phoneInfo['pImgFile']?>" alt="핸드폰 이미지">
                    </div>
                    <div class="phoneView__top__right">
                        <div class="phoneView__top__table">
                            <ul>
                                <li class="event"><?=$phoneInfo['pEvent']?></li>
                                <li class="title"><?=$phoneInfo['pTitle']?></li>
                                <li class="desc">
                                    <?=$phoneInfo['pDesc']?>
                                </li>
                                <li class="price">
                                    <p><em><?=$phoneInfo['pPrice']?></em>원</p>
                                </li>
                            </ul>
                        </div>
                        <a href="<?=$phoneInfo['pLink']?>" target="blank" class="btn__style3">바로가기</a>
                        <button type="submit" id="LikeButton">
                            <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m12 5.72c-2.624-4.517-10-3.198-10 2.461 0 3.725 4.345 7.727 9.303 12.54.194.189.446.283.697.283s.503-.094.697-.283c4.977-4.831 9.303-8.814 9.303-12.54 0-5.678-7.396-6.944-10-2.461z" fill-rule="nonzero"/></svg>
                        </button>
                    </div>
                </div>
                <div class="phoneView__bottom">
                    <h3>제품 사양</h3>
                </div>
                <div class="phoneView__table">
                    <ul class="phoneView__table__Option">
                        <li class="one">
                            <img src="../../assets/img/pprocess.png" alt="프로세스">
                            <div class="text">
                                <p><?=$phoneInfo['pProcess']?></p>
                                <span>PROCESS</span>
                            </div>
                        </li>
                        <li class="one">
                            <img src="../../assets/img/pcore.png" alt="코어">
                            <div class="text">
                                <p><?=$phoneInfo['pCore']?></p>
                                <span>CORE</span>
                            </div>
                        </li>
                        <li class="one">
                            <img src="../../assets/img/pdisplay.png" alt="디스플레이">
                            <div class="text">
                                <p><?=$phoneInfo['pDisplaySize']?></p>
                                <span>DISPLAY</span>
                            </div>
                        </li>
                        <li class="two">
                            <img src="../../assets/img/pmaterial.png" alt="소재">
                            <div class="text">
                                <p><?=$phoneInfo['pMaterial']?></p>
                                <span>MATERIAL</span>
                            </div>
                        </li>
                        <li class="two">
                            <img src="../../assets/img/psize.png" alt="사이즈">
                            <div class="text">
                                <p><?=$phoneInfo['pSize']?></p>
                                <span>SIZE</span>
                            </div>
                        </li>
                        <li class="one">
                            <img src="../../assets/img/pweight.png" alt="무게">
                            <div class="text">
                                <p><?=$phoneInfo['pWeight']?></p>
                                <span>WEIGHT</span>
                            </div>
                        </li>
                        <li class="one">
                            <img src="../../assets/img/pcamera.png" alt="카메라">
                            <div class="text">
                                <p><?=$phoneInfo['pCamera']?></p>
                                <span>CAMERA</span>
                            </div>
                        </li>
                        <li class="one">
                            <img src="../../assets/img/pbattery.png" alt="배터리">
                            <div class="text">
                                <p><?=$phoneInfo['pBattery']?></p>
                                <span>BATTERY</span>
                            </div>
                        </li>
                        <li class="one">
                            <img src="../../assets/img/pusb.png" alt="유에스비">
                            <div class="text">
                                <p><?=$phoneInfo['pUsb']?></p>
                                <span>USB</span>
                            </div>
                        </li>
                        <li class="two">
                            <img src="../../assets/img/pcolor.png" alt="컬러">
                            <div class="text">
                                <p><?=$phoneInfo['pColor']?></p>
                                <span>COLOR</span>
                            </div>
                        </li>
                        <li class="two">
                            <img src="../../assets/img/pvolume.png" alt="용량">
                            <div class="text">
                                <p><?=$phoneInfo['pVolume']?></p>
                                <span>VOLUME</span>
                            </div>
                        </li>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        // 공감버튼
        var likeStatus = '<?php echo $likeStatus; ?>';
        if (likeStatus === "liked") {
            $("#LikeButton > svg").css("fill", "var(--black400");
        } else {
            $("#LikeButton > svg").css("fill", "var(--red)");
        }

        $(function(){
            $("#LikeButton").click(function(){
                let phoneId = <?php echo $phoneId; ?>;
                let category = '<?php echo $category; ?>';
                
                $.ajax({
                    url: "phoneLike.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        "phoneId": phoneId,
                        "category": category,
                    },
                    success: function(data){
                        console.log(data);
                        if(data.info === "success"){
                            $("#LikeButton > svg").css("fill", "var(--black400)");
                        } else if(data.info === "alreadyLiked"){
                            alert("이미 위시리스트에 있습니다.");
                        } else if(data.info === "loginRequired"){
                            alert("로그인 후 이용할 수 있습니다.");
                            location.href = "../login/login.php";
                        } else {
                            alert("실패");
                        }
                    },
                    error: function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                });
            });
        });
    </script>
</body>
</html>