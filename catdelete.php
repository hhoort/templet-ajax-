<?php

include('admin/includes/config.php');


$id = $_GET['id'];

$delete = "UPDATE `category` SET cstatus = '0'  where cid = '$id'";

$result = mysqli_query($connection, $delete);
if(!$result){
  echo("query failed");
}
header('location:http://localhost/customized-admin-panel2-main/viewcat.php');

?>
