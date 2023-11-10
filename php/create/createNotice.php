<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE NBoard (";
    $sql .= "blogId int(10) unsigned auto_increment,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "nTitle varchar(255) NOT NULL,";
    $sql .= "nContents longtext NOT NULL,";
    $sql .= "nCategory varchar(10) NOT NULL,";
    $sql .= "nAuthor varchar(10) NOT NULL,";
    $sql .= "nRegTime int(10) NOT NULL,";
    
    $sql .= "nView int(10) DEFAULT NULL,";
    $sql .= "nLike int(10) DEFAULT NULL,";
    $sql .= "nImgFile varchar(100) DEFAULT NULL,";
    $sql .= "nImgSize varchar(100) DEFAULT NULL,";
    $sql .= "nModTime int(10) DEFAULT NULL,";
    $sql .= "nDelete int(10) DEFAULT 1,";

    $sql .= "PRIMARY KEY (blogId)";
    $sql .= ") charset=utf8";

    $result = $connect -> query($sql);

    if($result){
        echo "Create Tables Complete";
    } else {
        echo "Create Tables False";
    }
?>