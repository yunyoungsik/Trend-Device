<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE RBoard (";
    $sql .= "reviewId int(10) unsigned auto_increment,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "rTitle varchar(255) NOT NULL,";
    $sql .= "rContents longtext NOT NULL,";
    $sql .= "rCategory varchar(10) NOT NULL,";
    $sql .= "rAuthor varchar(10) NOT NULL,";
    $sql .= "rRegTime int(10) NOT NULL,";
    
    $sql .= "rView int(10) DEFAULT NULL,";
    $sql .= "rLike int(10) DEFAULT NULL,";
    $sql .= "rImgFile varchar(100) DEFAULT NULL,";
    $sql .= "rImgSize varchar(100) DEFAULT NULL,";
    $sql .= "rModTime int(10) DEFAULT NULL,";
    $sql .= "rDelete int(10) DEFAULT 1,";

    $sql .= "PRIMARY KEY (reviewId)";
    $sql .= ") charset=utf8";

    $result = $connect -> query($sql);

    if($result){
        echo "Create Tables Complete";
    } else {
        echo "Create Tables False";
    }
?>