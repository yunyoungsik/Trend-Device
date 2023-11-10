 <?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $memberID = $_SESSION['memberID'];
    $youPass = $_POST['youPass'];
    
    $sql = "SELECT memberID, youPass FROM tdMembers WHERE memberID = '$memberID' AND youPass = '$youPass'";
    $result = $connect->query($sql);
    
    if($result){
        $count = $result -> num_rows;

        if($count == 0){
            Header("Location:authfail.php");
            alert("비밀번호가 틀렸습니다.");
        }else{
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
            Header("Location:authsuccess.php");
        }
    }
?> 
