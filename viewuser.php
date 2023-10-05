<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('admin/includes/config.php');

$limit = 2;
if(isset($_GET['page'])){
  
  $getpgno = $_GET['page'];
}else{
  $getpgno = 1;
}
$offset = ($getpgno - 1) * $limit;

$fetch = "SELECT * FROM `user` where status = '1' limit {$offset}, {$limit}";

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
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($data)) {

            ?>
            <tr>
              <td>
                <?php echo $row['id'] ?>
              </td>
              <td>
                <?php echo $row['fname'] ?>
              </td>
              <td>
                <?php echo $row['lname'] ?>
              </td>
              <td>
                <?php echo $row['email'] ?>
              </td>

                
              

              
            <td>
                <a href="userupdate.php?id=<?php echo $row['id']; ?>" class="btn btn-warning"><?php echo 'Update' ?></a>
                <a href="userdelete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><?php echo 'Trash' ?></a>
              </td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>

      <?php
        $fetchpage = "SELECT * from user";
        $query = mysqli_query($connection, $fetchpage);
        
          if(mysqli_num_rows($query) > 0){
            $totalRecords = mysqli_num_rows($query);
            $totalpages = ceil($totalRecords / $limit);
            echo '<ul class="pagination">';
            if($getpgno > 1){
              echo '<li class="page-item"><a class="page-link" href="viewuser.php?page='.($getpgno - 1).'">prev</a></li>';

            }
            for($i = 1; $i <= $totalpages; $i++){
              $active = $i == $getpgno? "active" : "";
              echo '<li class="'.$active.' page-item"><a class="page-link" href="viewuser.php?page='.$i.'">'.$i.'</a></li>';
            }
            if($getpgno < $totalpages){
              echo '<li class="page-item"><a class="page-link" href="viewuser.php?page='.($getpgno + 1).'">next</a></li>';

            }
            // header('location:./viewuser.php');

          }
        
      
      
      ?>
</body>
</html>
<?php

include('admin/includes/footer.php');

?>