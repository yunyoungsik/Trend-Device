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
            <div class="board__inner container">
                <div class="board__top">
                    <h2>상품 게시판</h2>
                </div>
                <div class="board__write">
                    <form action="phoneWriteSave.php" name="phoneWriteSave" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend class="blind">상품 작성하기</legend>
                            <div class="bw__category phone">
                                <label for="pCategory">카테고리</label>
                                <select name="pCategory" id="pCategory">
                                    <option value="애플">애플</option>
                                    <option value="삼성">삼성</option>
                                    <option value="기타">기타</option>
                                </select>
                            </div>
                            <div class="bw__boardTitle phone">
                                <label for="pEvent">이벤트</label>
                                <div class="bw__boardTitle__input">
                                    <input type="text" id="pEvent" name="pEvent" class="input__style">
                                </div>
                            </div>
                            <div class="bw__boardTitle phone">
                                <label for="pTitle">상품명</label>
                                <div class="bw__boardTitle__input">
                                    <input type="text" id="pTitle" name="pTitle" class="input__style">
                                </div>
                            </div>
                            <div class="bw__boardCont phone">
                                <label for="pDesc">설명</label>
                                <div class="bw__textarea">
                                    <textarea name="pDesc" id="pDesc" rows="20" class="input__style"></textarea>
                                </div>
                            </div>
                            <div class="bw__boardTitle phone">
                                <label for="pLink">링크</label>
                                <div class="bw__boardTitle__input">
                                    <input type="text" id="pLink" name="pLink" class="input__style">
                                </div>
                            </div>
                            <div class="bw__boardTitle phone">
                                <label for="pPrice">가격</label>
                                <div class="bw__boardTitle__input">
                                    <input type="text" id="pPrice" name="pPrice" class="input__style">
                                </div>
                            </div>
                            <div class="bw__boardTitle phone">
                                <label for="pProcess">프로세스</label>
                                <div class="bw__boardTitle__input">
                                    <input type="text" id="pProcess" name="pProcess" class="input__style">
                                </div>
                            </div>
                            <div class="bw__boardTitle phone">
                                <label for="pCore">코어</label>
                                <div class="bw__boardTitle__input">
                                    <input type="text" id="pCore" name="pCore" class="input__style">
                                </div>
                            </div>
                            <div class="bw__boardTitle phone">
                                <label for="pDisplaySize">화면크기</label>
                                <div class="bw__boardTitle__input">
                                    <input type="text" id="pDisplaySize" name="pDisplaySize" class="input__style">
                                </div>
                            </div>
                            <div class="bw__boardTitle phone">
                                <label for="pMaterial">소재</label>
                                <div class="bw__boardTitle__input">
                                    <input type="text" id="pMaterial" name="pMaterial" class="input__style">
                                </div>
                            </div>
                            <div class="bw__boardTitle phone">
                                <label for="pSize">크기</label>
                                <div class="bw__boardTitle__input">
                                    <input type="text" id="pSize" name="pSize" class="input__style">
                                </div>
                            </div>
                            <div class="bw__boardTitle phone">
                                <label for="pWeight">무게</label>
                                <div class="bw__boardTitle__input">
                                    <input type="text" id="pWeight" name="pWeight" class="input__style">
                                </div>
                            </div>
                            <div class="bw__boardTitle phone">
                                <label for="pCamera">카메라</label>
                                <div class="bw__boardTitle__input">
                                    <input type="text" id="pCamera" name="pCamera" class="input__style">
                                </div>
                            </div>
                            <div class="bw__boardTitle phone">
                                <label for="pBattery">배터리</label>
                                <div class="bw__boardTitle__input">
                                    <input type="text" id="pBattery" name="pBattery" class="input__style">
                                </div>
                            </div>
                            <div class="bw__boardTitle phone">
                                <label for="pUsb">USB</label>
                                <div class="bw__boardTitle__input">
                                    <input type="text" id="pUsb" name="pUsb" class="input__style">
                                </div>
                            </div>
                            <div class="bw__boardTitle phone">
                                <label for="pColor">색상</label>
                                <div class="bw__boardTitle__input">
                                    <input type="text" id="pColor" name="pColor" class="input__style">
                                </div>
                            </div>
                            <div class="bw__boardTitle phone">
                                <label for="pVolume">용량</label>
                                <div class="bw__boardTitle__input">
                                    <input type="text" id="pVolume" name="pVolume" class="input__style">
                                </div>
                            </div>
                            <div class="bw__boardFile">
                                <label for="pImgFile">파일</label>
                                <input type="file" id="pImgFile" name="pImgFile">
                                <p>* jpg, gif, png, webp 파일만 넣을 수 있습니다. 이미지 용량은 1MB입니다.</p>
                            </div>
                            <div class="board__btns">
                                <button type="submit" class="btn__style save">저장하기</button>
                                <a href="notice.php" class="btn__style2">목록</a>
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