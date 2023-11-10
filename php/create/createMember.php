<?php
    include "../connect/connect.php";
    $sql = "create table tdMembers(";
    $sql .= "memberID int(10) unsigned auto_increment,";
    $sql .= "youName varchar(10) NOT NULL,";
    $sql .= "youEmail varchar(40),";
    $sql .= "youPass varchar(40) NOT NULL,";
    $sql .= "youBirth varchar(40) NOT NULL,";
    $sql .= "youPhone varchar(40) NOT NULL,";
    $sql .= "youAddress varchar(255) DEFAULT NULL,";
    $sql .= "youImgFile varchar(100) DEFAULT NULL,";
    $sql .= "youImgSize varchar(100) DEFAULT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY(memberID)";
    $sql .= ") charset=utf8;";
    $result = $connect -> query($sql);
    if($result){
        echo "Create Tables Complete";
    } else {
        echo "Create Tables False";
    }
?>