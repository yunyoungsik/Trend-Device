<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE Phone (";
    $sql .= "phoneId int(10) unsigned auto_increment,";
    $sql .= "pTitle varchar(255) NOT NULL,";
    $sql .= "pCategory varchar(10) NOT NULL,";
    $sql .= "pRegTime int(10) NOT NULL,";

    $sql .= "pDesc longtext DEFAULT NULL,";
    $sql .= "pLink longtext DEFAULT NULL,";
    $sql .= "pEvent varchar(100) DEFAULT NULL,";
    $sql .= "pPrice varchar(100) DEFAULT NULL,";
    $sql .= "pProcess varchar(100) DEFAULT NULL,";
    $sql .= "pCore varchar(100) DEFAULT NULL,";
    $sql .= "pDisplaySize varchar(100) DEFAULT NULL,";
    $sql .= "pMaterial varchar(100) DEFAULT NULL,";
    $sql .= "pSize varchar(100) DEFAULT NULL,";
    $sql .= "pWeight varchar(100) DEFAULT NULL,";
    $sql .= "pCamera varchar(100) DEFAULT NULL,";
    $sql .= "pBattery varchar(100) DEFAULT NULL,";
    $sql .= "pUsb varchar(100) DEFAULT NULL,";
    $sql .= "pColor varchar(100) DEFAULT NULL,";
    $sql .= "pVolume varchar(100) DEFAULT NULL,";
    
    $sql .= "pImgFile varchar(100) DEFAULT NULL,";
    $sql .= "pImgSize varchar(100) DEFAULT NULL,";
    $sql .= "pModTime int(10) DEFAULT NULL,";
    $sql .= "pDelete int(10) DEFAULT 1,";

    $sql .= "PRIMARY KEY (phoneId)";
    $sql .= ") charset=utf8";

    $result = $connect -> query($sql);

    if($result){
        echo "Create Tables Complete";
    } else {
        echo "Create Tables False";
    }
?>