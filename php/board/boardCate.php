<?php 
    include "../connect/connect.php";
    include "../connect/session.php";
    
    if(isset($_GET['category'])){
        $category = $_GET['category'];
    } else {
        Header("Location: boardCate.php");
    }
    
    $boardSql = "SELECT * FROM FBoard WHERE fDelete = 1 ORDER BY blogId DESC";
    $FboardInfo = $connect -> query($boardSql);
    
    // 현재 시간과의 차이 계산
    $currentTimestamp = time(); // 현재 시간의 타임스탬프
    
    // 총 페이지 갯수
    $sql = "SELECT count(blogId) FROM FBoard WHERE fDelete = 1";
    $result = $connect -> query($sql);
    
    $FboardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    $FboardTotalCount = $FboardTotalCount['count(blogId)'];
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
                    <a href="boardWrite.php?category=<?=$category?>" class="bw__btn__style">글쓰기</a>
                </div>
                <div class="board__search">
                    <form action="boardSearch.php" name="boardSearch" method="get">
                        <fieldset>
                            <legend class="blind">게시판 검색 영역</legend>
                            <input type="hidden" name="category" value="<?=$category?>">
                        </fieldset>
                        <div class="search__bar">
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z " fill="#59595A"/></svg>
                            </button>
                            <input type="search" name="searchKeyword" id="searchKeyword" placeholder="검색" required>
                        </div>
                    </form>    
                </div>
                <div class="board__pages">
                    <ul>
<?php
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }
    
    $viewNum = 10;
    $viewLimit = ($viewNum * $page) - $viewNum;
    
    // 총 페이지 갯수
    $boardTotalCount = ceil($FboardTotalCount/$viewNum);
    
    // 이전 페이지 링크
     if($page > 1){
        echo "<li class='prev'><a href='boardCate.php?page=".($page-1)."&category=".($category)."'>이전</a></li>";
    }
    // 다음 페이지 링크
    if($page < $boardTotalCount){
        echo "<li class='next'><a href='boardCate.php?page=".($page+1)."&category=".($category)."'>다음</a></li>";
    }
?>
                    </ul>
                </div>
                <div class="board__table">
                    <table>
                        <!-- <colgroup>
                            <col style="width: 5%">
                            <col style="width: 5%">
                            <col style="width: 5%">
                            <col style="width: 10%">
                            <col style="width: 10%">
                            <col>
                        </colgroup> -->
                        <thead class="blind">
                            <tr>
                                <th>프로필 이미지</th>
                                <th>게시글 제목</th>
                                <th>등록일</th>
                                <th>공감</th>
                                <th>조회수</th>
                                <th>작성자</th>
                            </tr>
                        </thead>
                        <tbody>
<?php 
    $sql = "SELECT * FROM FBoard WHERE fDelete = 1 AND fCategory = '$category' ORDER BY blogId DESC LIMIT {$viewLimit}, {$viewNum}";
    $result = $connect -> query($sql);
    
    if($sql){
        $count = $result -> num_rows;
        
        if($count > 0){
            for($i=0; $i<$count; $i++){
                $info = $result -> fetch_array(MYSQLI_ASSOC);
                $memberID = $info['memberID'];
                
                // 프로필 이미지 가져오기
                $imgSql = "SELECT youImgFile FROM tdMembers WHERE memberID = '$memberID'";
                $imgResult = $connect->query($imgSql);
                $imgInfo = $imgResult->fetch_array(MYSQLI_ASSOC);
                
                echo "<tr>";
                echo "<td rowspan='2' style='width: 5%'>";
                if (!empty($imgInfo['youImgFile'])) {
                    echo "<img src='../../assets/memberimg/{$imgInfo['youImgFile']}' alt='{$imgInfo['youName']}의 프로필'>";
                } else {
                    echo "<img src='../../assets/memberimg/icon__profile.png' alt='{$info['fAuthor']}의 프로필'>";
                }
                echo "</td>";
                echo    "<td colspan='5'><a href='boardView.php?blogId={$info['blogId']}&nTitle={$info['fTitle']}&category={$category}'>{$info['fTitle']}</a></td>";
                echo "</tr>";
                echo "<tr class='fG'>";
                echo    "<td>";
                            $timeDifference = $currentTimestamp - $info['fRegTime'];
                            
                            if ($timeDifference < 60) {
                                $timeAgo = $timeDifference." 초 전";
                            } elseif ($timeDifference < 3600) {
                                $minutes = floor($timeDifference / 60);
                                $timeAgo = $minutes." 분 전";
                            } elseif ($timeDifference < 86400) {
                                $hours = floor($timeDifference / 3600);
                                $timeAgo = $hours." 시간 전";
                            } else {
                                $days = floor($timeDifference / 86400);
                                $timeAgo = $days." 일 전";
                            }
                            
                            echo $timeAgo;
                echo    "</td>";
                echo    "<td>공감 <em>" . $info['fLike'] . "</em></td>";
                echo    "<td>조회수 <em>" . $info['fView'] . "</em></td>";
                echo    "<td>작성자 <em>" . $info['fAuthor'] . "</em></td>";
                echo    "<td style='width: 50%'></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>게시글이 없습니다.</td></tr>";
        }
    } else {
        echo "관리자에게 문의하세요.";
    }
?>
                        </tbody>
                    </table>
                </div>
                <div class="board__pages">
                    <ul>
<?php
    // 이전 페이지 링크
    if($page > 1){
        echo "<li class='prev'><a href='boardCate.php?page=".($page-1)."&category=".($category)."'>이전</a></li>";
    }
    // 다음 페이지 링크
    if($page < $boardTotalCount){
        echo "<li class='next'><a href='boardCate.php?page=".($page+1)."&category=".($category)."'>다음</a></li>";
    }
?>
                    </ul>
                </div>

                <!-- rank -->
                <div class="rank">
                    <div class="rTitle">
                        <h2>상위참여자</h2>
                        <div class="rCate">
                            <h3 id="bRank" class="active">게시물</h3>
                            <h3 id="cRank">댓글</h3>
                        </div>
                    </div>
                    <div class="rBody">
                        <div class="rBody__left bL">
                            <div class="rBody__title">
                                <span>회원</span>
                                <span>게시글</span>
                            </div>
<?php
    $sql = "SELECT memberID, COUNT(*) as postCount FROM FBoard WHERE fDelete = 1 GROUP BY memberID ORDER BY postCount DESC LIMIT 5";
    $result = $connect->query($sql);

    if($result){
        $rank = 1; // 변수를 추가하여 등수를 표시할 수 있습니다.
    
        while($row = $result->fetch_assoc()){
            $memberID = $row['memberID'];
            $postCount = $row['postCount'];
            $imgSql = "SELECT youImgFile, youName FROM tdMembers WHERE memberID = '$memberID'";
            $imgResult = $connect->query($imgSql);
            $imgInfo = $imgResult->fetch_array(MYSQLI_ASSOC);
    
            echo '<div class="rUser">';
            echo '<div class="rImg">';
            echo '<div class="img">';
            if (!empty($imgInfo['youImgFile'])) {
                echo "<img src='../../assets/memberimg/{$imgInfo['youImgFile']}' alt='{$imgInfo['youName']}의 프로필'>";
            } else {
                echo "<img src='../../assets/memberimg/icon__profile.png' alt='{$info['fAuthor']}의 프로필'>";
            }
            echo '</div>';
            echo '</div>';
            echo '<div class="rInfo">';
            echo "<p><i>{$rank}.</i>{$imgInfo['youName']}</p>"; // 등수를 표시합니다.
            if (!$memberID == 0){
                echo '<span>회원</span>';
            } else {
                echo '<span>운영자</span>';
            }
            echo '</div>';
            echo '<div class="rPoint">';
            echo $postCount;
            echo '</div>';
            echo '</div>';
    
            $rank++; // 등수를 증가시킵니다.
        }
    } else {
        echo "에러 발생: " . $connect->error;
    }
?>

                        </div>
                        <div class="rBody__right bR">
                            <div class="rBody__title">
                                <span>회원</span>
                                <span>게시글</span>
                            </div>
<?php
    $sql = "SELECT memberID, COUNT(*) as postCount FROM FBoard WHERE fDelete = 1 GROUP BY memberID ORDER BY postCount DESC LIMIT 5, 5";
    $result = $connect->query($sql);

    if($result){
        $rank = 6; // 변수를 추가하여 등수를 표시할 수 있습니다.
    
        while($row = $result->fetch_assoc()){
            $memberID = $row['memberID'];
            $postCount = $row['postCount'];
            $imgSql = "SELECT youImgFile, youName FROM tdMembers WHERE memberID = '$memberID'";
            $imgResult = $connect->query($imgSql);
            $imgInfo = $imgResult->fetch_array(MYSQLI_ASSOC);
    
            echo '<div class="rUser">';
            echo '<div class="rImg">';
            echo '<div class="img">';
            if (!empty($imgInfo['youImgFile'])) {
                echo "<img src='../../assets/memberimg/{$imgInfo['youImgFile']}' alt='{$imgInfo['youName']}의 프로필'>";
            } else {
                echo "<img src='../../assets/memberimg/icon__profile.png' alt='{$info['fAuthor']}의 프로필'>";
            }
            echo '</div>';
            echo '</div>';
            echo '<div class="rInfo">';
            echo "<p><i>{$rank}.</i>{$imgInfo['youName']}</p>"; // 등수를 표시합니다.
            if (!$memberID == 0){
                echo '<span>회원</span>';
            } else {
                echo '<span>운영자</span>';
            }
            echo '</div>';
            echo '<div class="rPoint">';
            echo $postCount;
            echo '</div>';
            echo '</div>';
    
            $rank++; // 등수를 증가시킵니다.
        }
    } else {
        echo "에러 발생: " . $connect->error;
    }
?>
                        </div>
                        <!-- //board Rank -->

                        <div class="rBody__left cL blind">
                            <div class="rBody__title">
                                <span>회원</span>
                                <span>댓글</span>
                            </div>
<?php
    $sql = "SELECT memberID, COUNT(*) as commentCount FROM boardComment GROUP BY memberID ORDER BY commentCount DESC LIMIT 5";
    $result = $connect->query($sql);

    if($result){
        $rank = 1;

        while($row = $result->fetch_assoc()){
            $memberID = $row['memberID'];
            $commentCount = $row['commentCount'];
            $imgSql = "SELECT youImgFile, youName FROM tdMembers WHERE memberID = '$memberID'";
            $imgResult = $connect->query($imgSql);
            $imgInfo = $imgResult->fetch_array(MYSQLI_ASSOC);

            echo '<div class="rUser">';
            echo '<div class="rImg">';
            echo '<div class="img">';
            if (!empty($imgInfo['youImgFile'])) {
                echo "<img src='../../assets/memberimg/{$imgInfo['youImgFile']}' alt='{$imgInfo['youName']}의 프로필'>";
            } else {
                echo "<img src='../../assets/memberimg/icon__profile.png' alt='{$imgInfo['youName']}의 프로필'>";
            }
            echo '</div>';
            echo '</div>';
            echo '<div class="rInfo">';
            echo "<p><i>{$rank}.</i>{$imgInfo['youName']}</p>";
            if (!$memberID == 0){
                echo '<span>회원</span>';
            } else {
                echo '<span>운영자</span>';
            }
            echo '</div>';
            echo '<div class="rPoint">';
            echo $commentCount;
            echo '</div>';
            echo '</div>';

            $rank++;
        }
    } else {
        echo "에러 발생: " . $connect->error;
    }
?>

                        </div>
                        <div class="rBody__right cR blind">
                            <div class="rBody__title">
                                <span>회원</span>
                                <span>댓글</span>
                            </div>
<?php
    $sql = "SELECT memberID, COUNT(*) as commentCount FROM boardComment GROUP BY memberID ORDER BY commentCount DESC LIMIT 5,5";
    $result = $connect->query($sql);

    if($result){
        $rank = 6;

        while($row = $result->fetch_assoc()){
            $memberID = $row['memberID'];
            $commentCount = $row['commentCount'];
            $imgSql = "SELECT youImgFile, youName FROM tdMembers WHERE memberID = '$memberID'";
            $imgResult = $connect->query($imgSql);
            $imgInfo = $imgResult->fetch_array(MYSQLI_ASSOC);

            echo '<div class="rUser">';
            echo '<div class="rImg">';
            echo '<div class="img">';
            if (!empty($imgInfo['youImgFile'])) {
                echo "<img src='../../assets/memberimg/{$imgInfo['youImgFile']}' alt='{$imgInfo['youName']}의 프로필'>";
            } else {
                echo "<img src='../../assets/memberimg/icon__profile.png' alt='{$imgInfo['youName']}의 프로필'>";
            }
            echo '</div>';
            echo '</div>';
            echo '<div class="rInfo">';
            echo "<p><i>{$rank}.</i>{$imgInfo['youName']}</p>";
            if (!$memberID == 0){
                echo '<span>회원</span>';
            } else {
                echo '<span>운영자</span>';
            }
            echo '</div>';
            echo '<div class="rPoint">';
            echo $commentCount;
            echo '</div>';
            echo '</div>';

            $rank++;
        }
    } else {
        echo "에러 발생: " . $connect->error;
    }
?>
                        </div>





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
    <script>
        document.querySelector("#bRank").addEventListener("click", function () {
            document.querySelector("#bRank").classList.add("active");
            document.querySelector(".rBody__left.cL").classList.add("blind");
            document.querySelector(".rBody__right.cR").classList.add("blind");

            document.querySelector("#cRank").classList.remove("active");
            document.querySelector(".rBody__left.bL").classList.remove("blind");
            document.querySelector(".rBody__right.bR").classList.remove("blind");
        });

        document.querySelector("#cRank").addEventListener("click", function () {
            document.querySelector("#cRank").classList.add("active");
            document.querySelector(".rBody__left.bL").classList.add("blind");
            document.querySelector(".rBody__right.bR").classList.add("blind");

            document.querySelector("#bRank").classList.remove("active");
            document.querySelector(".rBody__left.cL").classList.remove("blind");
            document.querySelector(".rBody__right.cR").classList.remove("blind");
        });
    </script>
</body>
</html>