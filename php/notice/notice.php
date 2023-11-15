<?php 
    include "../connect/connect.php";
    include "../connect/session.php";

    $boardSql = "SELECT * FROM NBoard WHERE nDelete = 1 ORDER BY blogId DESC";
    $NboardInfo = $connect -> query($boardSql);

    // 현재 시간과의 차이 계산
    $currentTimestamp = time(); // 현재 시간의 타임스탬프

    // 총 페이지 갯수
    $sql = "SELECT count(blogId) FROM NBoard WHERE nDelete = 1";
    $result = $connect -> query($sql);

    $NboardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    $NboardTotalCount = $NboardTotalCount['count(blogId)'];

    // echo $NboardTotalCount;
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
<?php 
    $memberID = $_SESSION['memberID'];

    $adminSql = "SELECT memberID FROM tdMembers WHERE memberID = 0";
    $adminResult = $connect -> query($adminSql);
    $adminInfo = $adminResult -> fetch_array(MYSQLI_ASSOC);

    if($memberID == $adminInfo['memberID']){
        echo "<a href='noticeWrite.php' class='bw__btn__style'>글쓰기</a>";
    } else {
        echo "<span></span>";
    }
?>
                </div>
                <div class="board__search">
                    <form action="noticeSearch.php" name="noticeSearch" method="get">
                        <fieldset>
                            <legend class="blind">게시판 검색 영역</legend>
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
    $boardTotalCount = ceil($NboardTotalCount/$viewNum);
    
    // 이전 페이지 링크
    if($page > 1){
        echo "<li class='prev'><a href='notice.php?page=".($page-1)."'>이전</a></li>";
    }

    // 다음 페이지 링크
    if($page < $boardTotalCount){
        echo "<li class='next'><a href='notice.php?page=".($page+1)."'>다음</a></li>";
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
    $sql = "SELECT * FROM NBoard WHERE nDelete = 1 ORDER BY blogId DESC LIMIT {$viewLimit}, {$viewNum}";
    $result = $connect -> query($sql);

    if($sql){
        $count = $result -> num_rows;
        
        if($count > 0){
            for($i=0; $i<$count; $i++){
                $info = $result -> fetch_array(MYSQLI_ASSOC);
                $memberId = $info['$memberID'];

                 // 프로필 이미지 가져오기
                 $imgSql = "SELECT youImgFile FROM tdMembers WHERE memberID = '$memberId'";
                 $imgResult = $connect->query($imgSql);
                 $imgInfo = $imgResult->fetch_array(MYSQLI_ASSOC);

                echo "<tr>";
                echo    "<td rowspan='2' style='width: 5%'>";
                    if (!empty($imgInfo['youImgFile'])) {
                        echo "<img src='../../assets/memberimg/{$imgInfo['youImgFile']}' alt='{$imgInfo['youName']}의 프로필'>";
                    } else {
                        echo "<img src='../../assets/memberimg/icon__profile.png' alt='{$info['fAuthor']}의 프로필'>";
                    }
                echo "</td>";
                echo    "<td colspan='5'><a href='noticeView.php?blogId={$info['blogId']}&nTitle={$info['nTitle']}'>{$info['nTitle']}</a></td>";
                echo "</tr>";
                echo "<tr class='fG'>";
                echo    "<td>";
                            $timeDifference = $currentTimestamp - $info['nRegTime'];

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
                echo    "<td>공감 <em>" . $info['nLike'] . "</em></td>";
                echo    "<td>조회수 <em>" . $info['nView'] . "</em></td>";
                echo    "<td>작성자 <em>" . $info['nAuthor'] . "</em></td>";
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
        echo "<li class='prev'><a href='notice.php?page=".($page-1)."'>이전</a></li>";
    }

    // 다음 페이지 링크
    if($page < $boardTotalCount){
        echo "<li class='next'><a href='notice.php?page=".($page+1)."'>다음</a></li>";
    }
?>
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
</body>
</html>