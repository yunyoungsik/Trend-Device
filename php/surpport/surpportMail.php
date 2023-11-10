<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $to = "yunyoungsik91@gmail.com"; // 여기에 이메일 주소를 입력하세요
        $subject = "문의사항"; // 이메일 제목을 입력하세요

        $supId = $_POST["supId"];
        $supCartegory = $_POST["supCartegory"];
        $supContents = $_POST["supContents"];

        $message = "아이디: $supId\n";
        $message .= "문의사항 카테고리: $supCartegory\n";
        $message .= "내용:\n$supContents";

        $headers = "From: yunyoungsik91@gmail.com"; // 여기에 보내는 사람의 이메일 주소를 입력하세요

        // 이메일 보내기
        $success = mail($to, $subject, $message, $headers);

        if ($success) {
            echo "<script>alert('이메일이 성공적으로 전송되었습니다.');</script>";
            echo "<script>window.location.href = 'surpport.php';</script>";
        } else {
            echo "이메일을 전송하는 중 오류가 발생했습니다.";
            echo "<script>alert('이메일을 전송하는 중 오류가 발생했습니다.');</script>";
            echo "<script>window.location.href = 'surpport.php';</script>";
        }
    } else {
        echo "<script>alert('유효하지 않은 요청입니다.');</script>";
        echo "<script>window.location.href = 'surpport.php';</script>";
    }
?>