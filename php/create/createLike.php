<?php
    include "../connect/connect.php";
    $sql = "create table LikedPosts(";
    $sql .= "likeId int(10) AUTO_INCREMENT PRIMARY KEY,";
    $sql .= "memberId varchar(10),";
    $sql .= "blogId varchar(40),";
    $sql .= "phoneId INT NULL,";
    $sql .= "likeCategory varchar(40),";
    $sql .= "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP";
    $sql .= ") charset=utf8;";

    $result = $connect -> query($sql);
    if($result){
        echo "Create Tables Complete";
    } else {
        echo "Create Tables False";
    }
?>