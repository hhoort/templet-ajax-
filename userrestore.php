<?php

include('admin/includes/config.php');

$id = $_GET['id'];

$restore = "UPDATE  `user` SET status = '1' where id = '$id' ";
$result = mysqli_query($connection, $restore);
if($result){
    header('location:http://localhost/customized-admin-panel2-main/usertrash.php');
}else{
    echo "query failed";
}

?>