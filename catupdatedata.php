<?php

include('admin/includes/config.php');


$id = $_POST['cid'];
$name = $_POST['catname'];
$type = $_POST['cattype'];
$des = $_POST['catdes'];



$updatequery = "UPDATE `category` set cid = '$id',  cname = '$name', ctype = '$type', cdescription = '$des' where cid = '$id'";

$result = mysqli_query($connection, $updatequery);
if(!$result){
    echo("query failed");
}

header('location:http://localhost/customized-admin-panel2-main/viewcat.php');


?>