<?php

include('admin/includes/config.php');

$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];



$updatequery = "UPDATE `user` set id = '$id',  fname = '$fname', lname = '$lname', email = '$email' where id = '$id'";

$result = mysqli_query($connection, $updatequery);
if(!$result){
    echo("query failed");
}

header('location:http://localhost/customized-admin-panel2-main/viewuser.php');


?>