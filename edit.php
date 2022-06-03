<?php
include('database.php');

$id = $_GET['id'];


if(isset($_POST['submit'])){
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$gender = mysqli_real_escape_string($conn,$_POST['gender']);

$sql = "UPDATE `crud` SET `fistname`='$firstname',`lastname`='$lastname',`email`='$email',`gender`='$gender' WHERE id=$id";
$Results = mysqli_query($conn, $sql);

if($Results){
  header('location: index.php?msg= recorded update succcess');
}
else{
    echo "Failed" . mysqli_connect_error();
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only bootsrap-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
 integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

 <!-- font awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
 integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous"
 referrerpolicy="no-referrer"/>

    <title>Crude APP</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue;">
        crude application
    </nav>

 <div class="container">
     <div class="text-center" >
         <h3>add new user</h3>
         <p class="text-muted">Edit user information below</p>
     </div>

     <?php
     $id = $_GET['id'];
     $sql ="SELECT * FROM crud WHERE id = $id LIMIT 1";
      $Results = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($Results);


    ?>
     <div class="container d-flext justify-content-center"> 
       <form action="" method="post" style="width:50vw; min-width: 300px;">
           <div class="row mb-3">
               <div class="col">
                   <label class="form-label">Firstname</label>
                   <input type="text"  class="form-control" value="<?php echo $row['fistname'] ?>" name="firstname" >
               </div>
               <div class="col">
                   <label class="form-label">lastname</label>
                   <input type="text" class="form-control"  value="<?php echo $row['lastname'] ?>" name="lastname" >
               </div>
           </div>
          <div class="mb-3">
          <label class="form-label">email</label>
          <input type="email"  class="form-control"  value="<?php echo $row['email'] ?>" name="email" >
          </div>
          <div class="form-group mb-3">
              <label for="">Gender</label> &nbsp;
              <input type="radio" name="gender" class="form-check-input" name="gender" id="male" value="male" <?php   echo($row['gender']=='male')?"checked":"" ?>>
              <label   class="form-input-label">male</label> &nbsp;
              <input type="radio" name="gender" class="form-check-input" name="gender" id="female" value="female" <?php   echo($row['gender']=='male')?"checked":"" ?>>
              <label  class="form-input-label">female</label>
          </div>

          <button class="btn btn-success" name="submit" type="sumbit">update</button>
          <a href="index.php" class="btn btn-danger">cancel</a>
       </form>
     </div>
 </div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
crossorigin="anonymous"></script>
</body>
</html>