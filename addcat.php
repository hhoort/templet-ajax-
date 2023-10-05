<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('admin/includes/config.php');

?>
<?php


if(isset($_POST['addcat'])){
    $name = mysqli_real_escape_string($connection,$_POST['catname']);
    $type = mysqli_real_escape_string($connection,$_POST['cattype']);
    $des = mysqli_real_escape_string($connection,$_POST['catdes']);


    $insertquery = "INSERT INTO `category` (`cname`, `ctype`, `cdescription`) VALUES ( '$name', '$type', '$des')";
    $result = mysqli_query($connection,$insertquery);
    if(!$result){
        echo "error";
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
                                <h1 class="h4 text-gray-900 mb-4">Add Category</h1>
                            </div>
                            <form action="addcat.php" method="post" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="catname" type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="cattype" type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Type">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="catdes" type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Description">
                                </div>
                                
                                <button name="addcat" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            
</body>
</html>
<?php
include('admin/includes/footer.php');

?>

<?php



