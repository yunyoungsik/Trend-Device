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
                                <li><a href="mypage.php">개인정보</a></li>
                                <li class="active"><a href="myinfo.php">개인정보 관리</a></li>
                                <li><a href="passModify.php">비밀번호 변경</a></li>
                                <li><a href="memberDelete.php">회원탈퇴</a></li>
                            </ul>
                        </div> 
                    </div>
                    <div class="mypage__info">
                        <div class="mapageInfo__header">
                            <h2>개인 정보 수정 및 관리</h2>
                            <p>전화번호 및 이메일 등의 정보를 관리하십시오.</p>
                        </div>
                        <div class="mypageInfo__footer">
                            <div>
                                <h2>이름</h2>
                                <p><?= $membersInfo['youName']?></p>
                                <img src="../../assets/img/icon__user.png" alt="">
                                <a href="#" class="modalName__btn">수정하기</a>
                            </div>
                            <div>
                                <h2>이메일</h2>
                                <p><?= $membersInfo['youEmail']?></p>
                                <img src="../../assets/img/icon__message.png" alt="">
                                <a href="#" class="modalEmail__btn">수정하기</a>
                            </div>
                            <div>
                                <h2>전화번호</h2>
                                <p><?= $membersInfo['youPhone']?></p>
                                <img src="../../assets/img/icon__phone.png" alt="">
                                <a href="#" class="modalPhone__btn">수정하기</a>
                            </div>
                            <div>
                                <h2>생년월일</h2>
                                <p><?= $membersInfo['youBirth']?></p>
                                <img src="../../assets/img/icon__calendar.png" alt="">
                                <a href="#" class="modalBirth__btn">수정하기</a>
                            </div>
                            <div>
                                <h2>정보</h2>
                                <p>내정보</p>
                                <img src="../../assets/img/icon__info.png" alt="">
                                <a href="#" class="modalEmail__btn">수정하기</a>
                            </div>
                            <div>
                                <h2>위시리스트</h2>
                                <img src="../../assets/img/icon__wish.png" alt="">
                                <a href="../wishlist/wishlist.php" class="modalEmail__btn">바로가기</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- //main -->

        <div id="modalName" class="modal-overlay">
            <div class="mymodalName mymodal">
                <img src="../../assets/img/icon__user3.png" alt="유저 이미지">
                <h2>이름 수정</h2>
                <div class="form">
                    <label for="firstName" class="blind">성</label>
                    <input type="text" id="firstName" name="firstName" placeholder="성을 입력해주세요">
                    <label for="nextName" class="blind">이름</label>
                    <input type="text" id="nextName" name="nextName" placeholder="이름을 입력해주세요">
                    <input type="password" id="ModifyeNamePass" name="commnetModifyPass" placeholder="비밀번호">
                    <p>* 비밀번호를 입력해주세요</p>
                </div>
                <div class="btn">
                    <button id="NameModifyCancel">취소</button>
                    <button id="NameModifyButton">수정</button>
                </div>
            </div>
        </div>

        
        <div id="modalEmail" class="modal-overlay">
            <div class="mymodalEmail mymodal">
                <img src="../../assets/img/icon__user3.png" alt="유저 이미지">
                <h2>이메일 수정</h2>
                <div class="form">
                    <label for="newEmail" class="blind">이메일 수정</label>
                    <input type="text" id="newEmail" name="newEmail" placeholder="변경할 이메일을 입력해주세요">
                    <input type="password" id="ModifyeEmailPass" name="commnetModifyPass" placeholder="비밀번호">
                    <p>* 비밀번호를 입력해주세요</p>
                </div>
                <div class="btn">
                    <button id="EmailModifyCancel">취소</button>
                    <button id="EmailModifyButton">수정</button>
                </div>
            </div>
        </div>

        <div id="modalPhone" class="modal-overlay">
            <div class="mymodalPhone mymodal">
                <img src="../../assets/img/icon__user3.png" alt="유저 이미지">
                <h2>전화번호 수정</h2>
                <div class="form">
                    <label for="newPhone" class="blind">전화번호 수정</label>
                    <input type="text" id="newPhone" name="newPhone" placeholder="변경할 전화번호를 입력해주세요">
                    <input type="password" id="ModifyePhonePass" name="commnetModifyPass" placeholder="비밀번호">
                    <p>* 비밀번호를 입력해주세요</p>
                </div>
                <div class="btn">
                    <button id="PhoneModifyCancel">취소</button>
                    <button id="PhoneModifyButton">수정</button>
                </div>
            </div>
        </div>

        <div id="modalBirth" class="modal-overlay">
            <div class="mymodalBirth mymodal">
                <img src="../../assets/img/icon__user3.png" alt="유저 이미지">
                <h2>생일 수정</h2>
                <div class="form">
                    <label for="Birth" class="blind">생일 수정</label>
                    <input type="text" id="Birth" name="Birth" placeholder="생일을 입력해주세요">
                    <input type="password" id="ModifyeBirthPass" name="commnetModifyPass" placeholder="비밀번호">
                    <p>* 비밀번호를 입력해주세요</p>
                </div>
                <div class="btn">
                    <button id="BirthModifyCancel">취소</button>
                    <button id="BirthModifyButton">수정</button>
                </div>
            </div>
        </div>

        <?php include "../include/footer.php" ?>
        <!-- //footer -->
    </div>
    <!-- //wrap -->

    <!-- script -->
    <script src="../assets/script/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        // 마이 모달창
        const modalNameBtn = document.querySelector(".modalName__btn");
        const modalName = document.querySelector("#modalName");
        const NameModifyCancel = document.querySelector("#NameModifyCancel");
        const NameModifyButton = document.querySelector("#NameModifyButton");
        modalNameBtn.addEventListener("click", e => {
            modalName.style.display = "flex";
            document.body.classList.add('disable-scroll');
        });
        NameModifyCancel.addEventListener("click", () => {
            modalName.style.display = "none";
            document.body.classList.remove('disable-scroll');
        });
        NameModifyButton.addEventListener("click", () => {
            if($("#firstName").val() == "" || $("#nextName").val() == ""){
                alert("이름을 적어주세요!");
                $("#firstName").focus();
            }else{
                if($("#ModifyePass").val() == ""){
                    alert("비밀번호 입력해주세요!");
                }else{
                    $.ajax({
                        url: "ModifyName.php",
                        method: "POST",
                        dataType: "json",
                        data: {
                            "memberID": <?= $memberID?>,
                            "firstName": $("#firstName").val(),
                            "nextName": $("#nextName").val(),
                            "ModifyeNamePass" : $("#ModifyeNamePass").val(),
                        },
                        success: function(data){
                            console.log(data);
                            if(data.result == "bad"){
                                alert("실패했어요");
                            }else{
                                alert("성공했어요");
                            }
                            location.reload();
                            
                        },
                        error: function(request, status, error){
                            console.log("request" + request);
                            console.log("status" + status);
                            console.log("error" + error);
                        }
                    })

                }
            }
        });


        const modalEmailBtn = document.querySelector(".modalEmail__btn");
        const modalEmail = document.querySelector("#modalEmail");
        const EmailModifyCancel = document.querySelector("#EmailModifyCancel");
        const EmailModifyButton = document.querySelector("#EmailModifyButton");
        modalEmailBtn.addEventListener("click", e => {
            modalEmail.style.display = "flex";
            document.body.classList.add('disable-scroll');
        });
        EmailModifyCancel.addEventListener("click", () => {
            modalEmail.style.display = "none";
            document.body.classList.remove('disable-scroll');
        });
        EmailModifyButton.addEventListener("click", () => {
            if($("#newEmail").val() == ""){
                alert("변경할 이메일을 적어주세요!");
                $("#newEmail").focus();
            }else{
                if($("#ModifyeEmailPass").val() == ""){
                    alert("비밀번호 입력해주세요!");
                }else{
                    $.ajax({
                        url: "ModifyEmail.php",
                        method: "POST",
                        dataType: "json",
                        data: {
                            "memberID": <?= $memberID?>,
                            "newEmail": $("#newEmail").val(),
                            "ModifyePhonePass" : $("#ModifyeEmailPass").val(),
                        },
                        success: function(data){
                            console.log(data);
                            if(data.result == "bad"){
                                alert("실패했어요");
                            }else{
                                alert("성공했어요");
                            }
                            location.reload();
                            
                        },
                        error: function(request, status, error){
                            console.log("request" + request);
                            console.log("status" + status);
                            console.log("error" + error);
                        }
                    })

                }
            }
        });

        const modalPhoneBtn = document.querySelector(".modalPhone__btn");
        const modalPhone = document.querySelector("#modalPhone");
        const PhoneModifyCancel = document.querySelector("#PhoneModifyCancel");
        const PhoneModifyButton = document.querySelector("#PhoneModifyButton");
        modalPhoneBtn.addEventListener("click", e => {
            modalPhone.style.display = "flex";
            document.body.classList.add('disable-scroll');
        });
        PhoneModifyCancel.addEventListener("click", () => {
            modalPhone.style.display = "none";
            document.body.classList.remove('disable-scroll');
        });
        PhoneModifyButton.addEventListener("click", () => {
            if($("#newPhone").val() == ""){
                alert("변경할 전화번호를 적어주세요!");
                $("#newPhone").focus();
            }else{
                if($("#ModifyePhonePass").val() == ""){
                    alert("비밀번호 입력해주세요!");
                }else{
                    $.ajax({
                        url: "ModifyPhone.php",
                        method: "POST",
                        dataType: "json",
                        data: {
                            "memberID": <?= $memberID?>,
                            "newPhone": $("#newPhone").val(),
                            "ModifyePhonePass" : $("#ModifyePhonePass").val(),
                        },
                        success: function(data){
                            console.log(data);
                            if(data.result == "bad"){
                                alert("실패했어요");
                            }else{
                                alert("성공했어요");
                            }
                            location.reload();
                            
                        },
                        error: function(request, status, error){
                            console.log("request" + request);
                            console.log("status" + status);
                            console.log("error" + error);
                        }
                    })

                }
            }
        });

        const modalBirthBtn = document.querySelector(".modalBirth__btn");
        const modalBirth = document.querySelector("#modalBirth");
        const BirthModifyCancel = document.querySelector("#BirthModifyCancel");
        const BirthModifyButton = document.querySelector("#BirthModifyButton");
        modalBirthBtn.addEventListener("click", e => {
            modalBirth.style.display = "flex";
            document.body.classList.add('disable-scroll');
        });
        BirthModifyCancel.addEventListener("click", () => {
            modalBirth.style.display = "none";
            document.body.classList.remove('disable-scroll');
        });
        BirthModifyButton.addEventListener("click", () => {
            if($("#Birth").val() == ""){
                alert("변경할 전화번호를 적어주세요!");
                $("#Birth").focus();
            }else{
                if($("#ModifyeBirthPass").val() == ""){
                    alert("비밀번호 입력해주세요!");
                }else{
                    $.ajax({
                        url: "ModifyBirth.php",
                        method: "POST",
                        dataType: "json",
                        data: {
                            "memberID": <?= $memberID?>,
                            "Birth": $("#Birth").val(),
                            "ModifyeBirthPass" : $("#ModifyeBirthPass").val(),
                        },
                        success: function(data){
                            console.log(data);
                            if(data.result == "bad"){
                                alert("실패했어요");
                            }else{
                                alert("성공했어요");
                            }
                            location.reload();
                            
                        },
                        error: function(request, status, error){
                            console.log("request" + request);
                            console.log("status" + status);
                            console.log("error" + error);
                        }
                    })

                }
            }
        });
</script>
</body>
</html>