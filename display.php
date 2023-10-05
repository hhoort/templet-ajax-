<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<center><h1>(form for users)</h1></center>
<form class="user" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input for="firstname" type="text" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="First Name" name="FirstName" id="firstname" required>
                </div>
                <div class="col-sm-6">
                    <input type="text" for="lastname" class="form-control form-control-user" id="exampleLastName"
                        placeholder="Last Name" name="LastName" id="lastname" required>
                 </div>
            </div>
            <div class="form-group">
                <input type="email" for="email"class="form-control form-control-user" id="exampleInputEmail"
                    placeholder="Email Address" name="email" id="email"required>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" for="password"class="form-control form-control-user"
                        id="exampleInputPassword" placeholder="Password" name="password" id="password" required>
                </div>
                <div class="col-sm-6">
                    <input type="password" for="rpassword" class="form-control form-control-user"
                        id="exampleRepeatPassword" placeholder="Repeat Password" id="rpassword"name="rpassword" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" id="submit">Submit</button>



</form>

    
</div>
<center><h1>(users data)</h1></center>

<br><br>

<!-- <button type="submit" class="btn btn-primary" id="btn">Submit</button> -->
<table class="table table-info">
  <thead>
    <tr >
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
    </tr>
  </thead>
  <tbody id="tab">
    <tr>
     
    </tr>
  </tbody>
</table>



<script src="js/jquery-3.7.1.min.js"></script>
<script>

    function loaddata(){
        $.ajax({
            url : 'fetch.php',
            type: 'POST',
            success : function(data){
                console.log(data)
                table.html(data)
            }
        })
    }
loaddata();
    $('submit').click(function(){
        $.ajax({
            url : 'insert.php',
            type: 'POST',
            data: $('#form input').serialize(),
            success : function(data){
                console.log(data);
                loaddata();
            }
        })
    }) 
    




</script>
</body>
</html>
