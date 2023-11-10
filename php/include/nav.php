<nav id="nav" >
    <div class="container">
        <ul>
            <li>
                스마트폰
                <ul class="submenu">
                    <li><a href="../phone/samsung.php">삼성</a></li>
                    <li><a href="../phone/apple.php">애플</a></li>
                    <li><a href="../phone/compare.php">제품비교하기</a></li>
                    <li><a href="../board/boardCate.php?category=리뷰게시판">제품리뷰</a></li>
                </ul>
            </li>
            <li>
                커뮤니티
                <ul class="submenu">
                    <li><a href="../notice/notice.php">공지사항</a></li>
                    <li><a href="../board/boardCate.php?category=자유게시판">자유게시판</a></li>
                </ul>
            </li>
            <li>
                고객센터
                <ul class="submenu">
                    <li><a href="../mypage/mypage.php">마이페이지</a></li>
                    <li><a href="../surpport/surpport.php">문의하기</a></li>
                </ul>
            </li>
        </ul>
    </div>
    
</nav>
<div class="navBg"></div>
<script>
    let header = document.querySelector("#header");
    let nav = document.querySelector("#nav");
    let navBg = document.querySelector(".navBg");
    let hamMenu = document.querySelector("#header .header__ham");
    let hamShape = document.querySelector("#header .header__ham div");

    function showNav() {
        if (window.innerWidth > 600) {
            nav.style.height = "360px";
            navBg.style.height = "100%";
            // document.body.classList.add("disable-scroll");
        } else {
            nav.style.height = "100vh";
        }
        hamShape.classList.add("hamX");
        hamShape.classList.remove("ham");

        hamMenu.removeEventListener("click", showNav);
        nav.removeEventListener("click", showNav);

        hamMenu.addEventListener("click", hideNav);
        nav.addEventListener("click", hideNav);
    };

    function hideNav() {
        nav.style.height = "0";
        navBg.style.height = "0";
        // document.body.classList.remove("disable-scroll");
        hamShape.classList.add("ham");
        hamShape.classList.remove("hamX");

        hamMenu.removeEventListener("click", hideNav);
        nav.removeEventListener("click", hideNav);

        hamMenu.addEventListener("click", showNav);
        nav.addEventListener("click", showNav);
    };

    hamMenu.addEventListener("click", showNav);
    nav.addEventListener("click", showNav);

    window.addEventListener("scroll", hideNav)
</script>