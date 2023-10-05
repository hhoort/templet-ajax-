<?php

include('admin/includes/config.php');

$id = $_GET['id'];

$per_del = "DELETE from `user` where id = '$id' ";

$result = mysqli_query($connection, $per_del);
if(!$result){
    echo "query failed";
}else{
    header('location:http://localhost/customized-admin-panel2-main/usertrash.php');
}


?>