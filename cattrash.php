<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('admin/includes/config.php');

$fetching_data ="SELECT * from `category` where cstatus = '0'";
$result = mysqli_query($connection,$fetching_data);
if($result){
    if(mysqli_num_rows($result) > 0){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<table class="table">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Restore</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    while($row = mysqli_fetch_assoc($result)){
                  ?>
                  <tr>
                    <td scope="row"><?php echo $row['cid'] ?></td>
                    <td><?php echo $row['cname'] ?></td>
                    <td><?php echo $row['ctype'] ?></td>
                    <td><?php echo $row['cdescription'] ?></td>
                    <td><a href="catrestore.php?id=<?php echo $row['cid'];  ?>" class="btn btn-primary">Restore</a></td>
                    <td><a href="catperdel.php?id=<?php echo $row['cid'];  ?>" class="btn btn-danger">Delete</a></td>
                  </tr>
                  <?php
                  }
                  ?>
                  </tbody>
                </table>

                <?php
                  }
                  }
                ?>
</body>
</html>

<?php

include('admin/includes/footer.php');

?>
