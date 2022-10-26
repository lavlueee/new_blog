
<?php 
///insert page
include('connection.php');


$error=array();

$email='';

$password='';




if(isset($_POST['submit'])){
  
 // $fullname = $_POST['fullname'];
  //$email = $_POST['email']

extract($_POST);



 if(empty($email)){

      $error['email'] = 'Please type email';

 }

 if(empty($password)){

      $error['password'] = 'Please fill up password';

 }


     if(count($error) == 0){


        
        $filed="";
        $filed.="email='$email'";
        $filed.=",password='$password'";
        

        $sql1="INSERT INTO registration SET ".$filed;
        $result = mysqli_query($con,$sql1);
        

       if($result){

      $error['success'] = "Data Successfully save database.";
      $successmsg= $error['success'];

      }else{
        $error['warning'] = "Data not save. something is woring!!";
      }



    }



}


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
 
</head>
<body>

<div class="container">
  <h2>Registration Form<a href="index.php">List </a></h2>

  <?php if(!empty($error['success'])){
    
  echo '<div class="alert alert-success">';
  echo '<strong>Success!$successmsg</strong>';
  echo '</div>';
 }?>

  <?php if(!empty($error['warning'])): ?>
    <div class="alert alert-warning">
    <strong>Warning!<?php echo $error['warning'];?></strong> .
  </div>
  <?php endif;  ?>

  <form method="POST" action="" autocomplete="off">
    
    <div class="form-group">
      <label for="email">E-mail:</label>
      <input type="email" class="form-control" autocomplete="off" id="email" placeholder="Enter E-mail" name="email">
       <span style="color:red;"><?php if(!empty($error['email'])){ echo $error['email'];}?></span>
    </div>



    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
      <span style="color:red;"><?php if(!empty($error['password'])){echo $error['password'];}?></span>
    </div>
   
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>












