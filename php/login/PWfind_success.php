<?php 
    include "../connect/connect.php";
    include "../connect/session.php";
    
    function generateRandomPassword($length = 10) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_+=';
        $password = str_shuffle($chars);
    
        // 1개 이상의 특수문자와 숫자 포함
        $password = substr_replace($password, '0123456789', rand(0, $length - 3), 1);
        $password = substr_replace($password, '!@#$%^&*()-_+=', rand(0, $length - 2), 1);
    
        return substr($password, 0, $length);
    }
    
    // Usage
    $password = generateRandomPassword();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $youEmail = mysqli_real_escape_string($connect, $_POST['youEmail']);
        $youBirth = mysqli_real_escape_string($connect, $_POST['youBirth']);
    
        $sql = "SELECT * FROM tdMembers WHERE youEmail = '$youEmail' AND youBirth = '$youBirth'";
        $result = $connect->query($sql);
    
        if ($result && $result->num_rows > 0) {
            // 이메일과 생년월일이 일치하는 회원이 있다면
            $row = $result->fetch_assoc();
    
            $memberID = $row['memberID'];
            $newPW = $password;
    
            $pwSql = "UPDATE tdMembers SET youPass = '$newPW' WHERE memberID = '$memberID';";
            $connect->query($pwSql);
    
            echo "<script>alert('새로운 비밀번호를 확인해주세요.')</script>";
        } else {
            // 이메일과 생년월일이 일치하는 회원이 없다면
            echo "<script>
                    alert('일치하는 정보가 없습니다.');
                    location.href = 'loginPW_find.php';
                </script>";
        }
    }
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
        <?php include "../include/header.php"?>
        <!-- //header -->
        
        <?php include "../include/nav.php"?>
        <!-- //nav -->

        
        <main id="main">
            <div class="find__result container3">
                <div class="findResult__title">
                    <h2>비밀번호 변경</h2>
                </div>
                <div class="find__resultBox">
                    <p>새로운 비밀번호는 [ <i><?= $password ?></i> ] 입니다.<br> 로그인 후 마이페이지에서 변경하시기바랍니다.</p>
                </div>
                <a href="main.html" class="btn__style3 main__btn">메인</a>
                <a href="login.html" class="btn__style3 login__btn">로그인</a>
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