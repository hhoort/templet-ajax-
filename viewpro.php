<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('admin/includes/config.php');



$limit = 4;
if(isset($_GET['pageno'])){
 $getpageno = $_GET['pageno'];
}else{
  $getpageno = 1;
}
$offset = ($getpageno - 1) * $limit;
$fetching_pro = "SELECT * from products as p INNER JOIN category as c on p.pcategory = c.cid  order by pid desc limit {$offset}, {$limit}";
$pro_result = mysqli_query($connection, $fetching_pro);
if (mysqli_num_rows($pro_result) > 0) {
  



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
           
            <th>Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($pro_data = mysqli_fetch_assoc($pro_result)) {

            ?>
            <tr>
              <td>
                <?php echo $pro_data['pname'] ?>
              </td>
              <td>
                <?php echo $pro_data['cname'] ?>
              </td>
              <td>
                <?php echo $pro_data['pdescription'] ?>
              </td>
              <td>
                <?php echo $pro_data['price'] ?>
              </td>
              <td>
                <img src="<?php echo 'uploadedimg/' . $pro_data['pimage'] ?>" alt="" height="50px" width="50px">
                
              </td>

              
            </tr>
            <?php
          }
        }
          ?>
        </tbody>
      </table>
      <?php
      $pagination = "SELECT * from `products`";
      $product = mysqli_query($connection, $pagination);

      if(mysqli_num_rows($product) > 0){
        $total_records = mysqli_num_rows($product);
        $pages = ceil($total_records / $limit);
        echo '  <ul class="pagination">';
        if($getpageno > 1){

          echo "<li class='page-item'><a class='page-link' href='viewpro.php?.($getpageno - 1).''> Prev </a></li>";
        }
        for($i = 1; $i <= $pages; $i++){
          $active = $i == $getpageno? "active" : "";
          echo " <li class='page-item'>
          <a class='page-link {$active}' href='viewpro.php?pageno={$i}'>{$i}</a>
          </li>";
        }
        if($pages > $getpageno){
  
          echo "<li class='page-item'><a class='page-link' href='viewpro.php?.($getpageno + 1).''> next </a></li>";
        }
      }
      
      
      ?>


 
    </body>
</html>
<?php

include('admin/includes/footer.php');

?>