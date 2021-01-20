<?php
session_start();
require 'includes/config.php';

if (isset($_POST["name"]) && isset($_POST["certnumber"]) && isset($_REQUEST["category"])) {
    $name = $_POST["name"];
    $name = strtolower($name);
    $serial = $_POST["certnumber"];
    $category = $_POST["category"];
}

$_SESSION['certno']=$serial;
$_SESSION['category']=$category;

switch ($category) {
        case 1:

    $result = mysql_query("SELECT * FROM `csr` WHERE `Name`= '".$name."' and `Sr_No`='".$serial."'") or die("Cannot connect to database!");
    $user_count = mysql_num_rows($result);
    if ($user_count==1) {
        header('location:success.php');
    } else {
        header('location:failure.php');
    }

    break;
  case 2:
    $result = mysql_query("SELECT * FROM `BrainFreeze` WHERE `Name`= '".$name."' and `Sr_No`='".$serial."' ") or die("Cannot connect to database!");
    $user_count = mysql_num_rows($result);
    if ($user_count==1) {
        header('location:success.php');
    } else {
        header('location:failure.php');
    }
    break;
	 case 3:

    $result = mysql_query("SELECT * FROM `MiniConvention` WHERE `Name`= '".$name."' and `Sr_No`='".$serial."'") or die("Cannot connect to database!");
    $user_count = mysql_num_rows($result);
    if ($user_count==1) {
        header('location:success.php');
    } else {
        header('location:failure.php');
    }

    break;
	 case 4:

    $result = mysql_query("SELECT * FROM `csr2` WHERE `Name`= '".$name."' and `Sr_No`='".$serial."'") or die("Cannot connect to database!");
    $user_count = mysql_num_rows($result);
    if ($user_count==1) {
        header('location:success.php');
    } else {
        header('location:failure.php');
    }

    break;
	case 5:

    $result = mysql_query("SELECT * FROM `hackathon` WHERE `Name`= '".$name."' and `Sr_No`='".$serial."'") or die("Cannot connect to database!");
    $user_count = mysql_num_rows($result);
    if ($user_count==1) {
        header('location:success.php');
    } else {
        header('location:failure.php');
    }

    break;
}
