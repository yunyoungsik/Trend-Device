<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessioncheck.php";

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
            /* height: 120vh; */
            /* overflow: auto; */
            background-color: #fff;
        }
        @media (max-width: 1300px){
            #main {
            }
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
                            <div class="mypageMenu__header__img">
                                <img src="../../assets/memberimg/<?= !empty($membersInfo['youImgFile']) ? $membersInfo['youImgFile'] : 'icon__profile.png' ?>" alt="<?= $membersInfo['youName']?>의 프로필">
                            </div>
                            <h2><?= $youName ?></h2>
                            <p><?= $membersInfo['youEmail']?></p>
                        </div>
                        <div class="mypageMenu__footer">
                            <ul>
                                <li class="active"><a href="mypage.php" >개인정보</a></li>
                                <!-- <li><a href="myinfo.php">개인정보 관리</a></li> -->
                                <li><a href="passModify.php">비밀번호 변경</a></li>
                                <li><a href="memberDelete.php">회원탈퇴</a></li>
                            </ul>
                        </div> 
                    </div>
                    <div class="mypage__info">
                        <div class="mapageInfo__header">
                            <h2>개인 정보</h2>
                            <p>전화번호 및 이메일 등의 정보를 관리하십시오.</p>
                        </div>
                        <div class="mypageInfo__footer">
                            <div class="modalName__btn">
                                <h2>이름</h2>
                                <p><?= $membersInfo['youName']?></p>
                                <img src="../../assets/img/icon__user.png" alt="">
                            </div>
                            <div class="modalEmail__btn">
                                <h2>이메일</h2>
                                <p><?= $membersInfo['youEmail']?></p>
                                <img src="../../assets/img/icon__message.png" alt="">
                            </div>
                            <div class="modalPhone__btn">
                                <h2>전화번호</h2>
                                <?php
                                    $youPhone = $membersInfo['youPhone']; 

                                    $first = substr($youPhone, 0, 3);
                                    $second = substr($youPhone, 3, 4);
                                    $third = substr($youPhone, 7, 4);

                                    $formattedDate = $first . " - " . $second . " - " . $third ;
                                ?>
                                <p><?= $formattedDate ?></p>
                                <img src="../../assets/img/icon__phone.png" alt="">
                            </div>
                            <div class="modalBirth__btn">
                                <h2 class="modalBirth__btn">생년월일</h2>
                                <?php
                                    $youBirth = $membersInfo['youBirth']; 

                                    $year = substr($youBirth, 0, 4);
                                    $month = substr($youBirth, 4, 2);
                                    $day = substr($youBirth, 6, 2);

                                    $month = ltrim($month, '0');
                                    $day = ltrim($day, '0');

                                    $formattedDate = $year . "년 " . $month . "월 " . $day . "일";
                                ?>

                                <p><?= $formattedDate ?></p>
                                <img src="../../assets/img/icon__calendar.png" alt="">
                            </div>
                            <div class="modalProfile__btn">
                                <h2>프로필 사진</h2>
                                <p><?= $membersInfo['youImgFile'] ?></p>
                                <img src="../../assets/img/icon__info.png" alt="">
                            </div>
                            <div>
                                <a href="../wishlist/wishlist.php" class="modalEmail__btn">
                                    <h2>위시리스트</h2>
                                    <img src="../../assets/img/icon__wish.png" alt="">
                                </a>
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
                    <p class="memberEmailMsg">* 비밀번호를 입력해주세요</p>
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
                    <p class="memberPhoneMsg">* -(하이픈)없이 입력해주세요</p>
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
                    <p class="memberBirthMsg">* YYYYMMDD, 하이픈 없이 숫자만 입력해주세요</p>
                </div>
                <div class="btn">
                    <button id="BirthModifyCancel">취소</button>
                    <button id="BirthModifyButton">수정</button>
                </div>
            </div>
        </div>

        <div id="modalProfile" class="modal-overlay">
            <div class="mymodalProfile mymodal">
                <img src="../../assets/img/icon__user3.png" alt="유저 이미지">
                <h2>프로필 사진 수정</h2>
                <div class="form">
                    <label for="Profile" class="blind">프로필사진 수정</label>
                    <input type="file" id="Profile">
                    <p>*jpg, gif, png, webp 파일만 넣을 수 있습니다. 이미지 용량은 1MB를 넘길 수 없습니다.</p>
                

                
                </div>
                <div class="btn">
                    <button id="ProfileModifyCancel">취소</button>
                    <button id="ProfileModifyButton">수정</button>
                </div>
            </div>
        </div>


        <?php include "../include/footer.php" ?>
        <!-- //footer -->
    </div>
    <!-- //wrap -->

    <!-- script -->
    <script src="../assets/script/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // 마이 모달창
        // const modalNameBtn = document.querySelector(".modalName__btn");
        // const modalName = document.querySelector("#modalName");
        // const NameModifyCancel = document.querySelector("#NameModifyCancel");
        // const NameModifyButton = document.querySelector("#NameModifyButton");
        // modalNameBtn.addEventListener("click", e => {
        //     modalName.style.display = "flex";
        //     document.body.classList.add('disable-scroll');
        // });
        // NameModifyCancel.addEventListener("click", () => {
        //     modalName.style.display = "none";
        //     document.body.classList.remove('disable-scroll');
        // });
        // NameModifyButton.addEventListener("click", () => {
        //     if($("#firstName").val() == "" || $("#nextName").val() == ""){
        //         alert("이름을 적어주세요!");
        //         $("#firstName").focus();
        //     }else{
        //         if($("#ModifyePass").val() == ""){
        //             alert("비밀번호 입력해주세요!");
        //         }else{
        //             $.ajax({
        //                 url: "ModifyName.php",
        //                 method: "POST",
        //                 dataType: "json",
        //                 data: {
        //                     "memberID": <?= $memberID?>,
        //                     "firstName": $("#firstName").val(),
        //                     "nextName": $("#nextName").val(),
        //                     "ModifyeNamePass" : $("#ModifyeNamePass").val(),
        //                 },
        //                 success: function(data){
        //                     console.log(data);
        //                     if(data.result == "bad"){
        //                         alert("실패했어요");
        //                     }else{
        //                         alert("성공했어요");
        //                     }
        //                     location.reload();
                            
        //                 },
        //                 error: function(request, status, error){
        //                     console.log("request" + request);
        //                     console.log("status" + status);
        //                     console.log("error" + error);
        //                 }
        //             })

        //         }
        //     }
        // });


        // const modalEmailBtn = document.querySelector(".modalEmail__btn");
        // const modalEmail = document.querySelector("#modalEmail");
        // const memberEmailMsg = document.querySelector(".memberEmailMsg");
        // const EmailModifyCancel = document.querySelector("#EmailModifyCancel");
        // const EmailModifyButton = document.querySelector("#EmailModifyButton");
        // modalEmailBtn.addEventListener("click", e => {
        //     modalEmail.style.display = "flex";
        //     document.body.classList.add('disable-scroll');
        // });
        // EmailModifyCancel.addEventListener("click", () => {
        //     modalEmail.style.display = "none";
        //     document.body.classList.remove('disable-scroll');
        // });


        // 이메일 유효성 검사
        let getyouEmail = RegExp(/^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-za-z0-9\-]+/);

        EmailModifyButton.addEventListener("click", () => {
            if(modalEmail.val() == ""){
                alert("변경할 이메일을 적어주세요!");
                modalEmail.focus();
            }else if(!getyouEmail.test(modalEmail.val())){
                memberEmailMsg.text("이메일의 형식이 올바르지 않습니다.");
                modalEmail.val('')
                modalEmail.focus();
                return false;
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
        const memberPhoneMsg = document.querySelector(".memberPhoneMsg");
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

        // 연락처 유효성 검사
        let getYouPhone = RegExp(/^[0-9]{10,11}$/); // 10자리 또는 11자리 숫자);
        PhoneModifyButton.addEventListener("click", () => {
            if($("#newPhone").val() == ""){
                alert("변경할 전화번호를 적어주세요!");
                $("#newPhone").focus();
            }else if(!getYouPhone.test($("#newPhone").val())){
                $(".memberPhoneMsg").text("휴대폰 번호가 정확하지 않습니다.(하이픈 없이 숫자만 적어주세요.)");
                modalPhone.focus();
                return false;
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
        const memberBirthMsg = document.querySelector(".memberBirthMsg");
        const BirthModifyCancel = document.querySelector("#BirthModifyCancel");
        const BirthModifyButton = document.querySelector("#BirthModifyButton");

        // 생년월일 유효성 검사
        let getYouBirth = /^(19\d{2}|20\d{2})(0[1-9]|1[0-2])(0[1-9]|[1-2][0-9]|3[0-1])$/;

        modalBirthBtn.addEventListener("click", e => {
            modalBirth.style.display = "flex";
            document.body.classList.add('disable-scroll');
        });

        BirthModifyCancel.addEventListener("click", () => {
            modalBirth.style.display = "none";
            document.body.classList.remove('disable-scroll');
        });

        BirthModifyButton.addEventListener("click", () => {
            if ($("#Birth").val() == "") {
                alert("변경할 생년월일을 입력해주세요!");
                $("#Birth").focus();
            } else if (!getYouBirth.test($("#Birth").val())) {
                memberBirthMsg.innerText = "생년월일이 정확하지 않습니다. (올바른 형식: YYYYMMDD, 하이픈 없이 숫자만 입력)";
                $("#Birth").val('');
                $("#Birth").focus();
                return false;
            } else {
                const year = parseInt($("#Birth").val().substring(0, 4));
                const month = parseInt($("#Birth").val().substring(4, 6));
                const day = parseInt($("#Birth").val().substring(6, 8));

                if (year < 1900 || year > new Date().getFullYear() || month < 1 || month > 12 || day < 1 || day > 31) {
                    memberBirthMsg.innerText = "생년월일이 유효하지 않습니다. (년도: 1900 이후, 월: 1-12, 일: 1-31)";
                    $("#Birth").val('');
                    $("#Birth").focus();
                    return false;
                } else {
                    $.ajax({
                        url: "ModifyBirth.php",
                        method: "POST",
                        dataType: "json",
                        data: {
                            "memberID": <?= $memberID ?>,
                            "Birth": $("#Birth").val(),
                        },
                        success: function(data) {
                            console.log(data);
                            if (data.result === "bad") {
                                alert("실패했어요");
                            } else {
                                alert("성공했어요");
                            }
                            location.reload();
                        },
                        error: function(request, status, error) {
                            console.log("request: " + request);
                            console.log("status: " + status);
                            console.log("error: " + error);
                        }
                    });
                }
            }
        });


        const modalProfileBtn = document.querySelector(".modalProfile__btn");
        const modalProfile = document.querySelector("#modalProfile");
        const ProfileModifyCancel = document.querySelector("#ProfileModifyCancel");
        const ProfileModifyButton = document.querySelector("#ProfileModifyButton");
        modalProfileBtn.addEventListener("click", e => {
            modalProfile.style.display = "flex";
            document.body.classList.add('disable-scroll');
        });
        ProfileModifyCancel.addEventListener("click", () => {
            modalProfile.style.display = "none";
            document.body.classList.remove('disable-scroll');
        });



        ProfileModifyButton.addEventListener("click", (e) => {

            let profileImage = $("#Profile")[0].files[0];

            // if(!profileImage) { 
            //     alert("이미지를 선택해주세요");
            //     return;
            // }

            let formData = new FormData();
            formData.append("profile", profileImage);

            $.ajax({
                url: "ModifyProfile.php",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    if (data.result == "bad") {
                        alert("프로필 사진 변경에 실패했습니다.");
                    } else {
                        alert("프로필 사진이 성공적으로 변경되었습니다.");
                        location.reload();
                    }
                },
            error: function (request, status, error) {
            console.log("request" + request);
            console.log("status" + status);
            console.log("error" + error);
        },
            });
        });

</script>
</body>
</html>