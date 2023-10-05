 <?php
include 'config.php';
extract ($_POST);

$insert="INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`, `rpassword`) VALUES ('$firstname', '$lastname', '$email', '$password', '$rpassword')";

$query = mysqli_connect($connection,$insert);




?> 