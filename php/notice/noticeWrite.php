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
                    <h2>공지사항</h2>
                </div>
                <div class="board__write">
                    <form action="noticeWriteSave.php" name="noticeWriteSave" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend class="blind">공지사항 작성하기</legend>
                            <div class="bw__category">
                                <label for="noticeCategory">카테고리</label>
                                <select name="noticeCategory" id="noticeCategory">
                                    <option value="공지사항">공지사항</option>
                                    <option value="업데이트">업데이트</option>
                                    <option value="이벤트">이벤트</option>
                                </select>
                            </div>
                            <div class="bw__boardTitle">
                                <label for="noticeTitle">제목</label>
                                <div class="bw__boardTitle__input">
                                    <input type="text" id="noticeTitle" name="noticeTitle" class="input__style">
                                </div>
                            </div>
                            <div class="bw__boardCont">
                                <label for="noticeContents">내용</label>
                                <div class="bw__textarea">
                                    <textarea name="noticeContents" id="noticeContents" rows="20" class="input__style"></textarea>
                                </div>
                            </div>
                            <div class="bw__boardFile">
                                <label for="noticeFile">파일</label>
                                <input type="file" id="noticeFile" name="noticeFile">
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