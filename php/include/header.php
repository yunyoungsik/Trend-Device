<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";
?>
<header id="header">
    <div class="container">
        <div class="header__menu">
            <div class="header__ham">
                <div class="ham">
                    <a href="#">
                        <span></span>
                    </a>
                </div>
            </div>
        </div>
        <h1><a href="../main/main.php">Trend Device</a></a></h1>
        <div class="header__etc">
           
<?php   if(isset($_SESSION['youName'])){ ?>
            <div class="agree"><a href="../mypage/mypage.php"><?php echo$_SESSION['youName'] ?></a><em>님 어서오세요.</em></div>
            <div class="header__user">
                <!-- <a href="../mypage/mypage.php"><img src="../../assets/img/login.png" alt="마이페이지"></a> -->
                <a href="../login/logout.php"><img src="../../assets/img/logout.png" alt="로그아웃"></a>
            </div>
<?php   }else{ ?>
            <div class="header__user">
                <a href="../login/login.php"><img src="../../assets/img/login.png" alt="회원"></a>
            </div>                    
<?php   }?>       
        </div>
        <?php
            $currentURL = $_SERVER['REQUEST_URI'];

            if (strpos($currentURL, 'login.php') !== false) {
                $pageTitle = '로그인';
            } elseif (strpos($currentURL, 'join.php') !== false) {
                $pageTitle = '회원가입';
            } elseif (strpos($currentURL, 'joinSuccess.php') !== false) {
                $pageTitle = '회원가입';
            } elseif (strpos($currentURL, 'notice.php') !== false) {
                $pageTitle = '공지사항';
            } elseif (strpos($currentURL, 'noticeView.php') !== false) {
                $pageTitle = '공지사항';
            } elseif (strpos($currentURL, 'noticeWirte.php') !== false) {
                $pageTitle = '공지사항';
            } elseif (strpos($currentURL, 'noticeModify.php') !== false) {
                $pageTitle = '공지사항';
            } elseif (strpos($currentURL, 'boardCate.php') !== false) {
                $pageTitle = '게시판';
            } elseif (strpos($currentURL, 'boardView.php') !== false) {
                $pageTitle = '게시판';
            } elseif (strpos($currentURL, 'boardWrite.php') !== false) {
                $pageTitle = '게시판';
            } elseif (strpos($currentURL, 'boardModify.php') !== false) {
                $pageTitle = '게시판';
            } elseif (strpos($currentURL, 'phone.php') !== false) {
                $pageTitle = '스마트폰';
            } elseif (strpos($currentURL, 'phoneView.php') !== false) {
                $pageTitle = '스마트폰';
            } elseif (strpos($currentURL, 'samsung.php') !== false) {
                $pageTitle = '삼성';
            } elseif (strpos($currentURL, 'apple.php') !== false) {
                $pageTitle = '애플';
            } elseif (strpos($currentURL, 'compare.php') !== false) {
                $pageTitle = '비교하기';
            } elseif (strpos($currentURL, 'mypage.php') !== false) {
                $pageTitle = '마이페이지';
            } elseif (strpos($currentURL, 'surpport.php') !== false) {
                $pageTitle = '고객센터';
            }
        ?>
        <div class="board__name">
            <?php echo $pageTitle; ?>
        </div>
    </div>
</header>