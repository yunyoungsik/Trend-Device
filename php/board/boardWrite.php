<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessioncheck.php";

    if(isset($_GET['category'])){
        $category = $_GET['category'];
    } else {
        Header("Location: boardCate.php");
    }

    $sql = "SELECT fCategory FROM FBoard WHERE fCategory <> '$category' AND fCategory <> '보류'";
    $result = $connect -> query($sql);
    $category2 = $result -> fetch_array(MYSQLI_ASSOC);
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
                    <h2><?=$category?></h2>
                </div>
                <div class="board__write">
                    <form action="boardWriteSave.php" name="boardWriteSave" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend class="blind">게시글 작성하기</legend>
                            <div class="bw__category blind">
                                <label for="boardCategory">카테고리</label>
                                <select name="boardCategory" id="boardCategory">
                                    <option value="<?=$category?>" selected><?=$category?></option>
                                    <option value="<?=$category2?>"><?=$category2['fCategory']?></option>
                                </select>
                            </div>
                            <div class="bw__boardTitle">
                                <label for="boardTitle">제목</label>
                                <div class="bw__boardTitle__input">
                                    <input type="text" id="boardTitle" name="boardTitle" class="input__style">
                                </div>
                            </div>
                            <div class="bw__boardCont">
                                <label for="boardContents">내용</label>
                                <div class="bw__textarea">
                                    <textarea name="boardContents" id="boardContents" rows="20" class="input__style"></textarea>
                                </div>
                            </div>
                            <div class="bw__boardFile">
                                <label for="boardFile">파일</label>
                                <input type="file" id="boardFile" name="boardFile">
                                <p>* jpg, gif, png, webp 파일만 넣을 수 있습니다. 이미지 용량은 1MB입니다.</p>
                            </div>
                            <div class="board__btns">
                                <button type="submit" class="btn__style save">저장하기</button>
                                <a href="board.php" class="btn__style2">목록</a>
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