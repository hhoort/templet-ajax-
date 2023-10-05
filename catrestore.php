<?php

include('admin/includes/config.php');

$id = $_GET['id'];

$restore = "UPDATE  `category` SET cstatus = '1' where cid = '$id' ";
$result = mysqli_query($connection, $restore);
if($result){
    header('location:http://localhost/customized-admin-panel2-main/cattrash.php');
}else{
    echo "query failed";
}

?>