<?php

include('admin/includes/config.php');



$id = $_GET['id'];

$delete = "UPDATE `user` SET status = '0'  where id = '$id'";

$result = mysqli_query($connection, $delete);
if(!$result){
  echo("query failed");
}
header('location:http://localhost/customized-admin-panel2-main/viewuser.php');

?>