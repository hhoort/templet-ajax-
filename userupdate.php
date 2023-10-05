<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('admin/includes/config.php');


$user_id = $_GET['id'];
$query = "SELECT * from `user` where id = '$user_id'";
$result = mysqli_query($connection, $query);
if(!$result){   
    echo("query failed");
}
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title> Update info using Php </title>
</head>
<body>
<div class="container">
<h1> Update Your Category</h1>
<form action="userupdatedata.php" method="post" class="form-group">
    <label for="fname">First Name  </label>
    <input type="hidden" name="cid" class="form-control" value="<?php echo $row['id'] ?>">
    <input type="text" name="fname" class="form-control" value="<?php echo $row['fname'] ?>">
    <label for="lname">Last Name  </label>
    <input type="text" name="lname" class="form-control" value="<?php echo $row['lname'] ?>">
    <label for="email"> Email  </label>
    <input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>">
    <input type="submit" name="submit" value="Update" class="btn btn-primary">
</form>
</div>

<?php
}
}
?>

</body>
<?php

include('admin/includes/footer.php');

?>
