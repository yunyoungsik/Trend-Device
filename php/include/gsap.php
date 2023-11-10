<!-- gsap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

<!-- 이미지 고정 -->
<div class="parallax__cont">
    <section id="section2" class="parallax__item">
        <span class="gsap_item02"><img src="../../assets/img/gsap_item02.jpg" alt="갤럭시Z플립5"></span>
        <div class="text">
            <span>Galaxy</span>
            <img src="../../assets/img/gsap_item_Z.png" alt="Z">
            <span>Flip5</span>
        </div>
        <a href="http://trenddevice2023.dothome.co.kr/TDsite/php/phone/phoneView.php?phoneId=22&category=%EC%83%81%ED%92%88%EA%B2%8C%EC%8B%9C%ED%8C%90" class="btn__style3">바로가기</a>
    </section>
    </section>
    <!-- //section2 -->

    <section id="section1" class="parallax__item">
        <span class="title">iPhone 15 Pro</span>
        <span class="gsap_item01"><img src="../../assets/img/gsap_item01.jpg" alt="아이폰15"></span>
        <a href="http://trenddevice2023.dothome.co.kr/TDsite/php/phone/phoneView.php?phoneId=38&category=%EC%83%81%ED%92%88%EA%B2%8C%EC%8B%9C%ED%8C%90" class="btn__style3">바로가기</a>
    </section>
    <!-- //section1 -->

    <section id="section3" class="parallax__item">
        <!-- <span class="bg"></span> -->
        <span class="gsap_item03"><img src="../../assets/img/gsap_item03.jpg" alt="갤럭시폴드5"></span>
        <span class=title>Galaxy Fold5</span>
        <a href="http://trenddevice2023.dothome.co.kr/TDsite/php/phone/phoneView.php?phoneId=23&category=%EC%83%81%ED%92%88%EA%B2%8C%EC%8B%9C%ED%8C%90" class="btn__style3">바로가기</a>
    </section>
    <!-- //section3 -->
</div>
<script>
    // 애니메이션
        const ani1 = gsap.timeline();
        ScrollTrigger.matchMedia({
            "(min-width: 601px)": function () {
                ani1.to("#section1 .gsap_item01", {xPercent: -150, ease: "expo.out", duration: 1,})
                    .to("#section1 .title", {opacity: 1, ease: "expo.out", duration: 2,})
                    .to("#section1 a", {yPercent: -100, opacity: 1, ease: "expo.out", duration: 1,})
                    ScrollTrigger.create({
                        animation: ani1,
                        start: "top top",
                        end: "+=2000",
                        trigger: "#section1",
                    })
            },
            "(max-width: 600px)": function () {
                ani1.to("#section1 .gsap_item01", {xPercent: -150, ease: "expo.out", duration: 1,})
                    .to("#section1 .title", {opacity: 1, ease: "expo.out", duration: 2,})
                    .to("#section1 a", {yPercent: -100, opacity: 1, ease: "expo.out", duration: 1,})
                    ScrollTrigger.create({
                        animation: ani1,
                        start: "top 50%",
                        end: "+=2000",
                        trigger: "#section1",
                    })
            },
        });

        const ani2 = gsap.timeline();
        ScrollTrigger.matchMedia({
            "(min-width: 601px)": function () {
                ani2.to("#section2 .gsap_item02", {scale: 1, ease: "expo.out", duration: 1,})
                    .to("#section2 .text", {yPercent: -100, opacity: 1, ease: "expo.out", duration: 2,})
                    .to("#section2 .text img", {scaleY: 1, opacity: 1, ease: "expo.out", duration: 1,})
                    .to("#section2 a", {yPercent: -100, opacity: 1, ease: "expo.out", duration: 1,})
                ScrollTrigger.create({
                    animation: ani2,
                    start: "top top",
                    end: "+=2000",
                    trigger: "#section2",
                })
            },
            "(max-width: 600px)": function () {
                ani2.to("#section2 .gsap_item02", {scale: 1, ease: "expo.out", duration: 1,})
                    .to("#section2 .text", {yPercent: -100, opacity: 1, ease: "expo.out", duration: 2,})
                    .to("#section2 .text img", {scaleY: 1, opacity: 1, ease: "expo.out", duration: 1,})
                    .to("#section2 a", {yPercent: -100, opacity: 1, ease: "expo.out", duration: 1,})
                ScrollTrigger.create({
                    animation: ani2,
                    start: "top 50%",
                    end: "+=2000",
                    trigger: "#section2",
                })
            },
        });

        const ani3 = gsap.timeline();
        ScrollTrigger.matchMedia({
            "(min-width: 601px)": function () {
                ani3.to("#section3 .gsap_item03", {scale: 1, opacity: 1, ease: "expo.out", duration: 4,})
                    .to("#section3 .title", {yPercent: -100, opacity: 1, ease: "expo.out", duration: 2,})
                    .to("#section3 a", {yPercent: -100, opacity: 1, ease: "expo.out", duration: 1,})
                ScrollTrigger.create({
                    animation: ani3,
                    start: "top top",
                    end: "+=2000",
                    trigger: "#section3",
                })
            },
            "(max-width: 600px)": function () {
                ani3.to("#section3 .gsap_item03", {scale: 0.8, opacity: 1, ease: "expo.out", duration: 4,})
                    .to("#section3 .title", {yPercent: -100, opacity: 1, ease: "expo.out", duration: 2,})
                    .to("#section3 a", {yPercent: -100, opacity: 1, ease: "expo.out", duration: 1,})
                ScrollTrigger.create({
                    animation: ani3,
                    start: "top 50%",
                    end: "+=2000",
                    trigger: "#section3",
                })
            },
        });
</script>