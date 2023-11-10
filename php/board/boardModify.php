<?php 
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessioncheck.php";

    $memberID = $_SESSION['memberID'];
    $blogId = $_GET['blogId'];

    
    if(isset($_GET['category'])){
        $category = $_GET['category'];
    } else {
        Header("Location: boardCate.php");
    }

    $cateSql = "SELECT fCategory FROM FBoard WHERE fCategory <> '$category' AND fCategory <> '보류'";
    $cateResult = $connect -> query($cateSql);
    $category2 = $cateResult -> fetch_array(MYSQLI_ASSOC);

    $fSql = "SELECT * FROM FBoard WHERE memberID = '$memberID' AND blogId = '$blogId'";
    $info = $connect -> query($fSql);
    $fInfo = $info -> fetch_array(MYSQLI_ASSOC);

    if(!$fInfo){
        echo "<script>alert('본인이 작성한 게시글만 수정 가능합니다.')</script>";
        echo "<script>window.history.back()</script>";
    }

    $boardSql = "SELECT * FROM FBoard WHERE fDelete = 1 ORDER BY blogId DESC";
    $FboardInfo = $connect -> query($boardSql);

    // 현재 시간과의 차이 계산
    $currentTimestamp = time(); // 현재 시간의 타임스탬프
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
                    <form action="boardModifySave.php" name="boardModifySave" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend class="blind">게시글 수정하기</legend>
<?php 
    echo '<input type="hidden" name="boardId" value="' . $blogId . '">';

    $sql = "SELECT * FROM FBoard WHERE blogId = {$blogId}";
    $result = $connect -> query($sql);

    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);

        echo "<div style='display:none'><label for='boardId'>번호</label><input type='text' id='boardId' name='boardId' class='input__style' value='".$info['blogId']."'></div>";
        echo "<div class='bw__category'><label for='boardCategory'>카테고리</label><select name='boardCategory' id='boardCategory'><option value='".$category."'>".$category."</option><option value='".$category2['fCategory']."'>".$category2['fCategory']."</option></select></div>";
        echo "<div class='bw__boardTitle'><label for='boardTitle'>제목</label><div class='bw__boardTitle__input'><input type='text' id='boardTitle' name='boardTitle' class='input__style' value='".$info['fTitle']."'></div></div>";
        echo "<div class='bw__boardCont'><label for='boardContents'>내용</label><div class='bw__textarea'><textarea name='boardContents' id='boardContents' rows='20' class='input__style'>".$info['fContents']."</textarea></div></div>";
        echo "<div class='bw__boardFile'><label for='boardFile'>파일</label><input type='file' id='boardFile' name='boardFile'><p>* jpg, gif, png, webp 파일만 넣을 수 있습니다. 이미지 용량은 1MB입니다.</p></div>";
    }
?>
                            <div class="board__btns">
                                <button type="submit" class="btn__style save">수정하기</button>
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