<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    if(isset($_GET['blogId'])){
        $blogId = $_GET['blogId'];
    } else {
        Header("Location: boardCate.php");
    }

    if(isset($_GET['category'])){
        $category = $_GET['category'];
    } else {
        Header("Location: board.php");
    }

    if(isset($_SESSION['memberID'])){
        $memberId = $_SESSION['memberID'];
    } else {
        $memberId = -1;
    }

    // 댓글 수정
    $commentName = $_SESSION['youName'];
    $commentPass = $_SESSION['youPass'];

    echo "<script>";
    echo "let blogId = $blogId;";
    echo "let memberId = $memberId;";
    echo "let commentName = '$commentName';"; // 문자열은 따옴표로 감싸줍니다.
    echo "let commentPass = '$commentPass';"; 
    echo "</script>";

    // 전체 게시물 수 가져오기
    $pageSql = "SELECT * FROM FBoard WHERE fDelete = 1 AND fCategory = '$category'";
    $pageResult = $connect -> query($pageSql);

    $allPageCount = $pageResult -> num_rows; 

    // 현재 페이지
    $pageSql2 = "SELECT * FROM FBoard WHERE blogId < '$blogId' AND fDelete = 1 AND fCategory = '$category'";
    $pageResult2 = $connect -> query($pageSql2);
    $prevPageCount = $pageResult2 -> num_rows;

    $currentPage = $allPageCount - $prevPageCount; 

    // 조회수 추가
    $updateViewSql = "UPDATE FBoard SET fView = fView + 1 WHERE blogId = '$blogId'";
    $connect -> query($updateViewSql);

    // 보드 정보 가져오기
    $boardSql = "SELECT * FROM FBoard WHERE blogId = '$blogId' AND fCategory = '$category'";
    $boardResult = $connect -> query($boardSql);
    $boardInfo = $boardResult -> fetch_array(MYSQLI_ASSOC);

    // 이전글 가져오기
    $prevBoardSql = "SELECT * FROM FBoard WHERE blogId > '$blogId' AND fCategory = '$category' ORDER BY blogId ASC LIMIT 1";
    $prevBoardResult = $connect -> query($prevBoardSql);
    $prevBoardInfo = $prevBoardResult -> fetch_array(MYSQLI_ASSOC);

    // 다음글 가져오기
    $nextBoardSql = "SELECT * FROM FBoard WHERE blogId < '$blogId' AND fCategory = '$category' ORDER BY blogId DESC LIMIT 1";
    $nextBoardResult = $connect -> query($nextBoardSql);
    $nextBoardInfo = $nextBoardResult -> fetch_array(MYSQLI_ASSOC);

    // 처음글 가져오기
    $firstBoardSql = "SELECT * FROM FBoard WHERE fCategory = '$category' ORDER BY blogId DESC LIMIT 1";
    $firstBoardResult = $connect -> query($firstBoardSql);
    $firstBoardInfo = $firstBoardResult -> fetch_array(MYSQLI_ASSOC);

    // 마지막글 가져오기
    $lastBoardSql = "SELECT * FROM FBoard WHERE fCategory = '$category' AND fCategory = '$category' ORDER BY blogId ASC LIMIT 1";
    $lastBoardResult = $connect -> query($lastBoardSql);
    $lastBoardInfo = $lastBoardResult -> fetch_array(MYSQLI_ASSOC);

    // 댓글 정보 가져오기
    $commentSql = "SELECT * FROM boardComment WHERE boardId = '$blogId' AND commentDelete = '1' ORDER BY commentId ASC";
    $commentResult = $connect -> query($commentSql);
    $commentInfo = $commentResult -> fetch_array(MYSQLI_ASSOC);
    $commentCount = $commentResult -> num_rows;

    // 사용자 이미지 가져오기
    $AmemberID = $boardInfo['memberID'];

    // 프로필 이미지 가져오기
    $imgSql = "SELECT youImgFile FROM tdMembers WHERE memberID = '$AmemberID'";
    $imgResult = $connect -> query($imgSql);
    $imgInfo = $imgResult -> fetch_array(MYSQLI_ASSOC);

    // 공감 상태 확인
    $likeStatus = "unliked";
    if(isset($_SESSION['memberID'])){
        $memberId = $_SESSION['memberID'];
        $checkLikeSql = "SELECT * FROM LikedPosts WHERE memberId = '$memberId' AND blogId = '$blogId'";
        $checkLikeResult = $connect->query($checkLikeSql);
        if($checkLikeResult->num_rows > 0){
            $likeStatus = "liked";
        }
    }

    // 게시글 작성자와 로그인한 사용자를 비교하여 해당 버튼을 출력하거나 숨깁니다.
    $isPostOwner = ($AmemberID === $memberId);

    // echo "<pre>";
    // var_dump($lastBoardInfo);
    // echo "</pre>";

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
                <div class="board__View">
                    <table>
                        <colgroup>
                            <col style="width: 3%;">
                            <col style="width: 5%">
                            <col style="width: 92%">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td rowspan="2"><img src="../../assets/memberimg/<?= !empty($imgInfo['youImgFile']) ? $imgInfo['youImgFile'] : 'icon__profile.png' ?>" alt="<?= $imgInfo['youName']?>의 프로필">   </td>
                                <td colspan="2">작성자 <em><?=$boardInfo['fAuthor']?></em></td>
                            </tr>
                            <tr>
                                <td>조회수 <em><?=$boardInfo['fView']?></em></td>
                                <td colspan="2">공감 <em><?=$boardInfo['fLike']?></em></td>
                            </tr>
                            <tr class="trPb"><td colspan="3"></td></tr>
                            <tr class="content__Title">
                                <td colspan="3">
                                    <?=$boardInfo['fTitle']?>
                                </td>
                            </tr>
                            <tr class="trPb"><td colspan="3"></td></tr>
                            <tr>
                                <td class="board_cotent" colspan="3">
                                    <img src="../../assets/boardimg/<?=$boardInfo['fImgFile']?>" alt="<?=$boardInfo['fTitle']?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="board_cotent" colspan="3">
                                    <?=$boardInfo['fContents']?>
                                </td>
                            </tr>
                            <tr>
                                <td class="trDay" colspan="3">게시일 <em>
<?php
    $timestamp = $boardInfo['fRegTime'];
    $am_pm = date('a', $timestamp);
    $ampm_str = ($am_pm == 'am') ? '오전' : '오후';
    echo date('Y. m. d', $timestamp) . ' ' . $ampm_str . ' ' . date('g:i', $timestamp);
?>
                                </em></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="board__btns">
                    <button type="submit" id="LikeButton" class="btn__style">공감</button>
                    <a href="boardCate.php?category=<?=$category?>" class="btn__style2">목록</a>
<?php if ($isPostOwner) { ?>
    <a href="boardModify.php?blogId=<?=$_GET['blogId']?>&category=<?=$category?>" class="btn__style2">수정하기</a>
    <a href="boardDelete.php?blogId=<?=$_GET['blogId']?>&category=<?=$category?>" class="btn__style2" onclick="return confirm('정말 삭제하시겠습니까?')">삭제하기</a>
<?php } ?>
                </div>

                <section id="boardComment" class="board__comment">
                    <h4>댓글: <?=$commentCount?></h4>
                    <div class="comment">
<?php
    if($commentResult->num_rows == 0){ ?>
        <div class="comment__view">
            <p>
                댓글이 없습니다.
            </p>
        </div>
    <?php } else {
        foreach($commentResult as $comment){ 
            // 이미지 가져오기
            $commentMemberId = $comment['memberId'];
            $commentImgSql = "SELECT youImgFile FROM tdMembers WHERE memberID = '$commentMemberId'";
            $commentImgResult = $connect->query($commentImgSql);
            $commentImgInfo = $commentImgResult->fetch_array(MYSQLI_ASSOC);
            $commentImgFile = !empty($commentImgInfo['youImgFile']) ? $commentImgInfo['youImgFile'] : 'icon__profile.png'; // 사용자 이미지가 없을 경우 기본 이미지 사용
            ?>
            <div class="comment__view">
                <div class="comment__info">
                    <div class="avata">
                        <img src="../../assets/memberimg/<?=$commentImgFile?>" alt="<?=$comment['memberId']?>">
                    </div>
                    <span>
                        <div class="author"><?=$comment['commentName']?></div>
                        <a href="#" class="modify" data-comment-id="<?=$comment['commentId']?>" data-member-id="<?=$comment['memberId']?>">수정</a>
                        <a href="#" class="delete" data-comment-id="<?=$comment['commentId']?>" data-member-id="<?=$comment['memberId']?>">삭제</a>
                    </span>
                </div>
                <div class="comment__cont">
                    <div class="date"><?=date('Y-m-d H:i', $comment['regTime'])?></div>
                    <p><?=$comment['commentMsg']?></p>
                </div>
            </div>
    <?php }
    }
?>
                        <div class="comment__input">
                            <form action="#">
                                <fieldset>
                                    <legend class="blind">댓글 쓰기</legend>
                                    <!-- <label for="commentName" class="blind">이름</label>
                                    <input type="text" id="commentName" name="commentName" class="input__style" placeholder="이름" required>
                                    <label for="commentPass" class="blind">비밀번호</label>
                                    <input type="password" id="commentPass" name="commentPass" class="input__style" placeholder="비밀번호" required> -->
                                    <label for="commentWrite" class="blind">댓글쓰기</label>
                                    <input type="text" id="commentWrite" name="commentWrite" class="input__style" placeholder="댓글을 써주세요!" required>
                                    <button type="button" id="commentWriteBtn" class="btn__style3">댓글쓰기</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </section>

                <div class="board__pages2">
                    <ul>
                        <?php if($firstBoardInfo['blogId'] != $blogId) { ?>
                            <li class="first"><a href="boardView.php?blogId=<?=$firstBoardInfo['blogId'];?>&category=<?=$category?>" class="first">&lt;&lt;</a></li>
                        <?php } else { ?>
                            <li class="first"><span></span></li>
                        <?php } ?>

                        <?php if(!empty($prevBoardInfo)) { ?>
                            <li class="prev"><a href="boardView.php?blogId=<?=$prevBoardInfo['blogId'];?>&category=<?=$category?>" class="prev">&lt;</a></li>
                        <?php } else { ?>
                            <li class="prev"><span></span></li>
                        <?php } ?>

                        <li class="pages2__select"><?=$currentPage?></li>

                        <li>/</li>

                        <li><?=$allPageCount?></li>

                        <?php if(!empty($nextBoardInfo)) { ?>
                            <li class="next"><a href="boardView.php?blogId=<?=$nextBoardInfo['blogId'];?>&category=<?=$category?>" class="next">&gt;</a></li>
                        <?php } else { ?>
                            <li class="next"><span></span></li>
                        <?php } ?>
                        

                        <?php if($lastBoardInfo['blogId'] != $blogId) { ?>
                            <li class="last"><a href="boardView.php?blogId=<?=$lastBoardInfo['blogId'];?>&category=<?=$category?>" class="last">&gt;&gt;</a></li>
                        <?php } else { ?>
                            <li class="last"><span></span></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </main>
        <!-- //main -->

        <?php include "../include/footer.php" ?>
        <!-- //footer -->

        <div id="popupDelete" class="none">
            <div class="comment__delete">
                <h4>댓글 삭제</h4>
                <label for="commentPass" class="blind">비밀번호</label>
                <input type="password" id="commentDeletePass" name="commentDeletePass" placeholder="비밀번호">
                <p>* 입력했던 비밀번호를 입력해주세요!</p>
                <div class="btn">
                    <button id="commentDeleteCancle">취소</button>
                    <button id="commentDeleteButton">삭제</button>
                </div>
            </div>
        </div>

        <div id="popupModify" class="none">
            <div class="comment__modify">
                <h4>댓글 수정</h4>
                <label for="commentModifyMsg" class="blind">비밀번호</label>
                <textarea name="commentModifyMsg" id="commentModifyMsg" rows="4" placeholder="수정할 내용을 적어주세요!"></textarea>
                <input type="password" id="commentModifyPass" name="commentModifyPass" placeholder="비밀번호">
                <p>* 입력했던 비밀번호를 입력해주세요!</p>
                <div class="btn">
                    <button id="commentModifyCancle">취소</button>
                    <button id="commentModifyButton">수정</button>
                </div>
            </div>
        </div>
    </div>
    <!-- //wrap -->
    
    <script src="../assets/script/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                            
    <script>
        let commentId = "";

        // 댓글 쓰기 버튼
        $("#commentWriteBtn").click(function(){
            if(memberId != -1){
                if($("#commentWrite").val() == ""){
                    alert("댓글을 작성해주세요!");
                    $("#commentWrite").focus();
                } else {
                    $.ajax({
                        url: "boardCommentWrite.php",
                        method: "POST",
                        dataType: "json",
                        data: {
                            "blogId": blogId,
                            "memberId": memberId,
                            "name": commentName,
                            "pass": commentPass,
                            "msg": $("#commentWrite").val(),
                        },
                        success: function(data){
                            console.log(data);
                            location.reload();
                        },
                        error: function(request, status, error){
                            console.log("request" + request);
                            console.log("status" + status);
                            console.log("error" + error);
                        }
                    })
                }
            } else {
                alert("로그인 후 이용가능합니다.");
                window.location.href = "../login/login.php";
            }
        });

        // 댓글 삭제 버튼
        $(".comment__view .delete").click(function(e){
            e.preventDefault();
            commentId = $(this).data("comment-id");
            commentMemberId = $(this).data("member-id");
            if(commentMemberId === memberId){
                $("#popupDelete").removeClass("none");
            } else {
                alert("자신이 작성한 댓글만 삭제 가능합니다.");
            }
        });

        // 댓글 삭제 버튼 --> 취소 버튼
        $("#commentDeleteCancle").click(function(){
            $("#popupDelete").addClass("none");
        });

        // 댓글 삭제 버튼 --> 삭제 버튼
        $("#commentDeleteButton").click(function(){
            if($("#commentDeletePass").val() == ""){
                alert("비밀번호를 작성해주세요!");
                $("#commentDeletePass").focus();
            } else {
                $.ajax({
                    url: "boardCommentDelete.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        "memberId": memberId,
                        "commentPass": $("#commentDeletePass").val(),
                        "commentId": commentId,
                    },
                    success: function(data){
                        console.log(data);
                        if(data.result == "bad"){
                            alert("비밀번호가 일치하지 않습니다.");
                        } else {
                            alert("댓글이 삭제되었습니다.");
                        }
                        location.reload();
                    },
                    error: function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }
        });

        // 댓글 수정 버튼
        $(".comment__view .modify").click(function(e){
            e.preventDefault();
            commentId = $(this).data("comment-id");
            commentMemberId = $(this).data("member-id");
            if(commentMemberId === memberId){  
                $("#popupModify").removeClass("none"); 

                let commentMsg = $(this).closest(".comment__view").find("p").text();
                $("#commentModifyMsg").val(commentMsg);
                $("#commentModifyMsg").focus();
            } else {
                alert("자신이 작성한 댓글만 수정 가능합니다.");
            }
        });

        // 댓글 수정 버튼 --> 취소 버튼
        $("#commentModifyCancle").click(function(){
            $("#popupModify").addClass("none");
        });

        // 댓글 수정 버튼 --> 수정 버튼
        $("#commentModifyButton").click(function(){
            if($("#commentModifyPass").val() == ""){
                alert("댓글 작성시 비밀번호를 작성해주세요!");
                $("#commentModifyPass").focus();
            } else {
                $.ajax({
                    url: "boardCommentModify.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        "commentMsg": $("#commentModifyMsg").val(),
                        "commentPass": $("#commentModifyPass").val(),
                        "commentId": commentId,
                    },
                    success: function(data){
                        console.log(data);
                        if(data.result == "bad"){
                            alert("비밀번호가 일치하지 않습니다.");
                        } else {
                            alert("댓글이 수정되었습니다.");
                        }
                        location.reload();
                    },
                    error: function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }
        });

        // 공감버튼
        var likeStatus = '<?php echo $likeStatus; ?>';
        if (likeStatus === "liked") {
            $("#LikeButton").css("background-color", "var(--black400");
        } else {
            $("#LikeButton").css("background-color", "var(--blue100)");
        }

        $("#LikeButton").click(function(){
            $.ajax({
                url: "boardLike.php",
                method: "POST",
                dataType: "json",
                data: {
                    "blogId": <?=$blogId?>,
                },
                success: function(data){
                    console.log(data);

                    if(data.info === "success"){
                        $("#LikeButton").css("background-color", "#8A8A8A");
                    } else if(data.info === "unliked"){
                        $("#LikeButton").css("background-color", "var(--blue100)"); // 공감이 취소된 경우 초기 색상으로 변경
                    } else if(data.info === "loginRequired"){
                        alert("로그인 후 이용할 수 있습니다.");
                        location.href = "../login/login.php";
                    } else {
                        alert("실패");
                    }
                },
                error: function(request, status, error){
                    console.log("request" + request);
                    console.log("status" + status);
                    console.log("error" + error);
                }
            })
            location.reload();
        })
    </script>
</body>
</html>