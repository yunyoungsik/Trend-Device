# Trend-Device
<img width="100%" src="https://github.com/yunyoungsik/Trend-Device/blob/main/assets/img/thumbnail.jpg?raw=true" />
Trend Device는 직관적이고 사용하기 편리한 인터페이스를 제공하여 사용자가 원하는 휴대폰 모델을 선택하고, 선택한 모델들을 한눈에 비교할 수 있도록 합니다.

각 휴대폰 모델에는 사진, 기술 사양, 가격 등의 정보가 제공되어 사용자가 원하는 정보를 쉽게 찾을 수 있습니다.

또한, 사용자들은 자신의 요구 사항과 선호도에 맞는 휴대폰을 찾기 위해 여러 기능을 필터링하고 정렬할 수 있습니다. 이를 통해 사용자들은 다양한 옵션을 비교하고, 가장 적합한 휴대폰 모델을 선택할 수 있게 됩니다.

Trend Device는휴대폰의 장단점을 명확히 보여주며, 사용자들이 최종 결정을 내리기 위한 정보를 제공하여 휴대폰 구매 과정을 보다 간편하고 이성적으로 할 수 있도록 도와줍니다.

# 주소
[Trend Device](http://trenddevice2023.dothome.co.kr/TDsite/php/main/main.php)

## 팀원소개
|윤영식|서유진|김우주|
|:---:|:---:|:---:|
|<img width="150px" src="https://avatars.githubusercontent.com/u/144635640?v=4" />|<img width="150px" src="https://avatars.githubusercontent.com/u/144635615?v=4">|<img width="150px" src="https://avatars.githubusercontent.com/u/144635615?v=4">|

## 프로젝트소개
<p>
Trend Device는 사용자들이 혼란스럽게 다가올 수 있는 삼성과 애플의 다양한 스마트폰 모델 중에서 최적의 선택을 할 수 있도록 돕는 플랫폼입니다.
스마트폰 시장의 끊임없는 변화 속에서, 어떤 스마트폰을 선택해야 할지 결정하는 것은 어려운 일일 수 있습니다.

<strong>Trend Device는 이러한 문제를 해결하기 위해 사용자들에게 다음과 같은 기능을 제공합니다:</strong>

1. <strong>다양한 모델 비교</strong>: Trend Device는 삼성과 애플의 다양한 스마트폰 모델의 사양, 기능, 가격 등을 비교하고 분석하여 사용자들에게 제공합니다. 이를 통해 사용자들은 자신의 요구 사항과 우선 순위에 맞춰 가장 적합한 장치를 선택할 수 있습니다.

2. <strong>최신 트렌드와 정보 제공</strong>: 스마트폰 시장의 동향과 새로운 기술에 대한 정보를 제공하여 사용자들이 최신 트렌드를 따라갈 수 있도록 합니다. 새로운 출시 소식, 업데이트 등을 쉽게 찾아볼 수 있습니다.

3. <strong>사용자 경험과 리뷰</strong>: 사용자들의 리뷰, 사용자들 사이에서 토론을 진행하며 제품의 사용 경험을 미리 파악할 수 있습니다.

Trend Device는 스마트폰을 구매하고자 하는 모든 사용자들에게 신뢰할 수 있는 정보를 제공하여, 최상의 결정을 내릴 수 있도록 돕습니다. 끊임없이 변화하는 시장에서 최신 정보와 정확한 비교를 통해 사용자들이 스마트폰을 선택하는 과정을 간편하고 투명하게 만들어줍니다.

이제 Trend Device를 통해 여러분의 다음 스마트폰을 선택해보세요!
</p>

## 주요기능
1. 비교 : 삼성과 애플의 다양한 스마트폰 모델의 사양, 기능, 가격 등을 비교할 수 있는 환경을 제공하며, 2개에서 최대 4개까지 사용자들이 설정한 환경에서 비교, 분석을 할 수 있습니다.
2. 경험 : 사용자들의 다양한 제품 사용경험을 리뷰를 통해 공유하여 제품 사용경험을 미리 파악 할수 있으며, 상품과 상품을 설정하여 토론을 진행하여 제품을 구매하는 부분에 참고할 수 있습니다.

## 기여
1. 메인
   - 슬라이드는 Javascript를 사용하여 슬라이드 기능을 구현하고 GSAP와 Scroll Triger를 사용하여 각 섹션에 이미지와 어울리는 움직임을 표현하려고 했습니다.   
2. 상품페이지
   - PHP로 작성된 반복문(foreach)을 사용하여 $categoryResult 배열의 각 요소를 순회하며 핸드폰 정보를 리스트로 생성합니다.
   - $categoryResult 배열에 있는 각 요소($phone)를 하나씩 가져와서 반복합니다.
   - 각 반복 요소마다 <li class="item"> 태그를 생성하여 리스트 아이템을 만듭니다.
   - <a> 태그를 이용하여 핸드폰 정보 페이지로 연결되는 링크를 생성합니다. 이미지($phone['pImgFile'])와 해당 제품의 이름($phone['phoneTitle'])을 이미지 태그(<img class="img">)의 src와 alt 속성에 표시합니다.
   - foreach 루프를 사용하여 $categoryResult 배열에 있는 각 요소($phone)를 하나씩 가져와서 반복합니다.
   - 핸드폰의 제목, 간단한 설명, 그리고 가격등 을 <div class="text"> 안에 <p>와 <span> 태그로 표시합니다.
3. 비교하기
   - 드롭다운 메뉴에서 변경 사항이 감지되면 이벤트를 트리거합니다. 이벤트는 선택된 옵션의 값(this.value)을 기반으로 데이터를 필터링하고,해당 데이터에서 선택된 값을 기준으로 정보를 가져와 화면에 표시하는 역할을 합니다.
   - 이벤트는 선택된 옵션의 값(this.value)을 기반으로 데이터를 필터링하고, 해당 데이터에서 선택된 값을 기준으로 정보를 가져와 화면에 표시합니다.

### 트러블슈팅
[문제]   
비교 페이지에 처음 접속했을 때 'a'와 'img' 요소에 초기값이 없어서 문제가 발생했습니다.   
   
[해결방법]   
처음 접속 시에는 초기값이 없는 상태에서 비교 페이지에 들어가면서 'a'와 'img' 요소에 데이터를 추가해야 했습니다.   
아래는 이를 해결하기 위해 JavaScript로 구현한 부분입니다.   
```js
if (selectedPhone) {
 const link = document.createElement('a');
 link.href = `${selectedPhone.pLink}`;
 link.className = 'btn__style3';
 link.innerText = '바로가기';
 link.target = '_black';
 const linkContainer = document.querySelector('.pLink1');
 linkContainer.innerHTML = '';
 linkContainer.appendChild(link);
}

if (selectedPhone) {
 const img = document.createElement('img');
 img.src = `../../assets/phoneimg/${selectedPhone.pImgFile}`;
 img.alt = `${selectedPhone.pTitle}`;
 const imageContainer = document.querySelector('.pImgFile1');
 imageContainer.innerHTML = '';
 imageContainer.appendChild(img);
}
```
이 코드는 선택된 핸드폰 정보가 있을 때만 실행되며, 해당 정보를 바탕으로 'a' 요소와 'img' 요소를 생성하여 초기화된 상태의 컨테이너에 추가하는 방식으로 문제를 해결했습니다.   
이렇게 하면 페이지가 처음 로드될 때 초기값이 없어 발생하는 문제를 방지할 수 있습니다.   

## 스택
<div disflay="flex" flex-direction:column; align-items:flex-start;>
  <p><strong>Environment</strong></p>
  <div>
    <img src="https://img.shields.io/badge/VisualStudioCode-007ACC?style=flat-square&logo=VisualStudioCode&logoColor=white">
    <img src="https://img.shields.io/badge/Github-181717?style=flat-square&logo=Github&logoColor=white"> 
    <img src="https://img.shields.io/badge/Git-F05032?style=flat-square&logo=Git&logoColor=white">
    <img src="https://img.shields.io/badge/Filezilla-BF0000?style=flat-square&logo=Filezilla&logoColor=white">
  </div>
  <p><strong>Development</strong></p>
  <div>
    <img src="https://img.shields.io/badge/html5-E34F26?style=flat-square&logo=html5&logoColor=white"> 
    <img src="https://img.shields.io/badge/css-1572B6?style=flat-square&logo=css3&logoColor=white">
    <img src="https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=PHP&logoColor=black">
  </div>
  <p><strong>Communication</strong></p>
  <div>
    <img src="https://img.shields.io/badge/Slack-4A154B?style=flat-square&logo=Slack&logoColor=white">
    <img src="https://img.shields.io/badge/Notion-000000?style=flat-square&logo=Notion&logoColor=white">
  </div>
</div>

## 작업과정
[작업과정](http://trenddevice2023.dothome.co.kr/TDsite/html_index.html)


