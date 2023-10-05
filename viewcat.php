<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('admin/includes/config.php');
$fetch = "SELECT * FROM `category` where cstatus = '1'";

$data = mysqli_query($connection, $fetch);
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
            <th>Id</th>
            <th> Name</th>
            <th>Type</th>
            <th>Description</th>
            <th>Status</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($data)) {

            ?>
            <tr>
              <td>
                <?php echo $row['cid'] ?>
              </td>
              <td>
                <?php echo $row['cname'] ?>
              </td>
              <td>
                <?php echo $row['ctype'] ?>
              </td>
              <td>
                <?php echo $row['cdescription'] ?>
              </td>
                <?php
                if($row['cstatus'] == 1){
                ?>
                
              <td>
                <?php echo "Active" ?>
              </td>
                 <?php
                }
                 ?> 

              <td>

                <a href="catupdate.php?id=<?php echo $row['cid']; ?>" class="btn btn-warning"><?php echo 'Update' ?></a>
                <a href="catdelete.php?id=<?php echo $row['cid']; ?>" class="btn btn-danger"><?php echo 'Trash' ?></a>
              </td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>

</body>
</html>

<?php

include('admin/includes/footer.php');

?>