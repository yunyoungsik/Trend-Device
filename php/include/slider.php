<div id="slider">
    <div class="sliderWrap">
        <div class="slider s1">
            <div class="text">
                <strong>iPhone 15 Pro</strong>
                <p>티타늄. 초강력. 초경량. 초프로.</p>
                <i>10월 13일 출시</i>
                <a href="http://trenddevice2023.dothome.co.kr/TDsite/php/phone/phoneView.php?phoneId=38&category=%EC%83%81%ED%92%88%EA%B2%8C%EC%8B%9C%ED%8C%90">더 알아보기 ></a>
            </div>
        </div>
        <div class="slider s2">
            <div class="text">
                <span>Galaxy Z Flip5</span>
                <strong>갤럭시 Z 플립5</strong>
                <p>갤럭시 Z 플립 사상 최대 크기의 커버 스크린, 플렉스 윈도우</p>
                <i>08월 11일 출시</i>
                <a href="http://trenddevice2023.dothome.co.kr/TDsite/php/phone/phoneView.php?phoneId=22&category=%EC%83%81%ED%92%88%EA%B2%8C%EC%8B%9C%ED%8C%90">더 알아보기 ></a>
            </div>
        </div>
        <div class="slider s3">
            <div class="text">
                <span>SAMSUNG</span>
                <strong>THOM BROWNE.</strong>
                <p>NEW YORK</p>
                <i>09월 12일 사전예약</i>
                <a href="http://trenddevice2023.dothome.co.kr/TDsite/php/phone/phoneView.php?phoneId=23&category=%EC%83%81%ED%92%88%EA%B2%8C%EC%8B%9C%ED%8C%90">더 알아보기 ></a>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = () => {
        // 슬라이드
        let currentIndex = 0;   //현재 이미지
        const sliderWrap = document.querySelector(".sliderWrap");   //전체 이미지
        const slider = document.querySelectorAll(".slider");    //각각이미지
        const sliderClone = sliderWrap.firstElementChild.cloneNode(true);
        sliderWrap.appendChild(sliderClone);

        let slideInterval;

        function slide() {
            currentIndex++;
            sliderWrap.style.transition = "all 0.6s";   //애니메이션 추가
            sliderWrap.style.marginLeft = -currentIndex * 100 + "%";  //왼쪽으로 100%씩 이동

            if (currentIndex == slider.length) {
                setTimeout(() => {
                    sliderWrap.style.transition = "0s";
                    sliderWrap.style.marginLeft = "0";
                    currentIndex = 0;
                }, 1000);
            }
        }
        slideInterval = setInterval(slide, 5000);
    };
</script>