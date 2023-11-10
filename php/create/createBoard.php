<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE FBoard (";
    $sql .= "blogId int(10) unsigned auto_increment,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "fTitle varchar(255) NOT NULL,";
    $sql .= "fContents longtext NOT NULL,";
    $sql .= "fCategory varchar(10) NOT NULL,";
    $sql .= "fAuthor varchar(10) NOT NULL,";
    $sql .= "fRegTime int(10) NOT NULL,";
    
    $sql .= "fView int(10) DEFAULT NULL,";
    $sql .= "fLike int(10) DEFAULT NULL,";
    $sql .= "fImgFile varchar(100) DEFAULT NULL,";
    $sql .= "fImgSize varchar(100) DEFAULT NULL,";
    $sql .= "fModTime int(10) DEFAULT NULL,";
    $sql .= "fDelete int(10) DEFAULT 1,";

    $sql .= "PRIMARY KEY (blogId)";
    $sql .= ") charset=utf8";

    $result = $connect -> query($sql);

    if($result){
        echo "Create Tables Complete";
    } else {
        echo "Create Tables False";
    }
?>