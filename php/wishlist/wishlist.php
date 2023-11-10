<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    // 세션정보
    $memberID = $_SESSION['memberID'];
    $youName = $_SESSION['youName'];

    // 상품정보 가져오기
    $wishSql = "SELECT L.memberId, L.phoneId, L.likeCategory, P.phoneId, P.pTitle, P.pImgFile FROM LikedPosts L JOIN Phone P ON L.phoneId = P.phoneId WHERE L.memberId = '$memberID' ORDER BY L.likeId DESC";
    $wishResult = $connect -> query($wishSql);
    $wishInfo = $wishResult -> fetch_all(MYSQLI_ASSOC);

    $wishCount = $wishResult->num_rows;
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
            background-color: #fff;
        }

        .mylist__img {
            position: relative;
        }
        .mylist__delete {
            position: absolute;
            right: 8px;
            top: 7px;
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
            <div class="wishList__inner container2">
                <div class="wishList__title">
                    <h2>
                        <?= $youName ?>님의<br>
                        관심 목록</h2>
                    <p>
                        이전에 저장해둔 제품을 계속 쇼핑하세요. 관심 제품을 친구나 가족, 그리고<br>
                        Trend 스페셜 리스트에 공유하고 꼭 맞는 제품을 찾아보세요.
                    </p>
                </div>
                <div class="wishList__contents">
                    <div class="wishList__edit">
                        <h2>관심 제품</h2>
                        <p class="edit">편집</p>
                    </div>
                    <div class="wishList__mylist">
                        <?php 
                            if($wishCount == 0){ ?>
                                <div class="mylist__nocomment">
                                    <p>찜한 상품이 없습니다.</p>
                                </div>
                            <?php } else { 
                                foreach($wishInfo as $list){ ?>
                                    <div>
                                        <div class="mylist__img">
                                            <img src="../../assets/phoneimg/<?=$list['pImgFile']?>" alt="관심 제품 이미지">
                                            <div class="mylist__delete none">
                                                <a href="#" class="delete" data-list-id="<?=$list['phoneId']?>">삭제</a>
                                            </div>
                                        </div>
                                        <div class="mylist__showAll">
                                            <p><?=$list['pTitle']?></p>
                                        </div>
                                        <div class="mylist__info">
                                            <a href="../phone/phoneView.php?phoneId=<?=$list['phoneId']?>">세부 정보 보기 ></a>
                                        </div>
                                    </div>
                            <?php }
                            }
                        ?>
                        
                        <!-- <div>
                            <div class="mylist__img">
                                <img src="../../assets/img/mylist__img.png" alt="관심 제품 이미지">
                            </div>
                            <div class="mylist__showAll">
                                <p>모든 관심제품</p>
                            </div>
                            <div class="mylist__count">1개 항목</div>
                            <div class="mylist__info">
                                <a href="phoneView.html">세부 정보 보기 ></a>
                            </div>
                        </div> -->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        let listId = "";

        // 리스트 수정
        $(".wishList__edit .edit").click(function(e){
            e.preventDefault();
            $(".mylist__delete").removeClass("none");
        })

        // 리스트 삭제하기
        $(".mylist__delete .delete").click(function(e){
            e.preventDefault();
            listId = $(this).data("list-id");

            $.ajax({
                url: "wishDelete.php",
                method: "POST",
                dataType: "json",
                data: {
                    "listId": listId,
                },
                success: function(data){
                    location.reload();
                },
                error: function(request, status, error){
                    console.log("request" + request);
                    console.log("status" + status);
                    console.log("error" + error);
                }
            })
        });
    </script>
</body>
</html>