<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('admin/includes/config.php');

if(isset($_POST['addpro'])){
    $pname = $_POST['pname'];
    $pcat = $_POST['pcat'];
    $pdesc = $_POST['pdesc'];
    $price = $_POST['price'];
    $image_name = $_FILES['image']['name'];
    $pimage_tmp = $_FILES['image']['tmp_name'];
    $pimage_size = $_FILES['image']['size'];
    //    echo"<pre>";
    // print_r($_FILES);
    // echo"</pre>";

    $check_product = "SELECT * from products where pname = '$pname'";
    $result = mysqli_query($connection, $check_product);
    if (mysqli_num_rows($result) > 0) {
        echo "<script> alert('Product already exist'); </script>";
    } else {
        $insert_pro ="INSERT INTO `products` (`pname`, `pcategory`, `pdescription`, `price`, `pimage`) VALUES ('$pname', '$pcat', '$pdesc', '$price', '$image_name')";
        $connection_insert = mysqli_query($connection, $insert_pro);
        move_uploaded_file($pimage_tmp, 'uploadedimg/' . $image_name);
        if($connection_insert){
            echo "<script> alert('Product added successfully'); </script>";

        }
        
    }


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="row">
                    <div class="col-lg-5 d-none d-lg-block form-reg-bg"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add Product</h1>
                            </div>
                            <form action="addpro.php" method="post" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="pname" type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Name">
                                    </div>
                                    <div class="col-sm-6">
                                    <?php
                                       $product = "SELECT * from category";
                                       $result1 = mysqli_query($connection, $product);
                                       if(mysqli_num_rows($result1) > 0) {

                
                                    ?>
                                       <select class="form-select" name="pcat" aria-label="Default select example">
                                           <option selected>Select Category</option>
                                           <?php
                                           while($row = mysqli_fetch_assoc($result1)){
                                           ?>
                                           <option value="<?php echo $row['cid']?>"><?php echo  $row['cname']?></option>
                                           <?php
                                           }  
                                           }                
                                        ?>
                                       </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="pdesc" type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Description">
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="price" type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Price">
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="file" name="image" class="form-control" placeholder="img">
                                    </div>
                                    
                                </div>
                               
                               
                                
                                <button class="btn btn-success" name="addpro">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            
</body>
</html>

  
<?php

include('admin/includes/footer.php');

?>