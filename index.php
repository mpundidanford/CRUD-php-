<?php
include "database.php";

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

     <?php
         if(isset($_GET['msg'])){
         $msg = $_GET['msg'];
         echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
         '.$msg.'
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';

         }
    ?>
         <a href="add_user.php" class="btn btn-dark mb-3">Add user</a>
         <table class="table table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Firstname</th>
                            <th scope="col">lastname</th>
                            <th scope="col">email</th>
                            <th scope="col">Genger</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php
                              $sql = "SELECT * FROM crud";
                              $result = mysqli_query($conn, $sql);

                              while($row = mysqli_fetch_assoc($result)){
                                
                                ?>
                                  <tr>
                            <td> <?php echo $row['id'] ?> </td>
                            <td><?php echo $row['fistname'] ?> </td>
                            <td><?php echo $row['lastname'] ?> </td>
                            <td><?php echo $row['email']  ?> </td>
                            <td><?php echo $row['gender']  ?> </td>
                            <td>
                            <a href="edit.php?id= <?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                            <a href="delete.php?id= <?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5 me-3"></i></a>
                            </td>
                            </tr>

                                <?php
                              }
                            ?>
                          
                        </tbody>
                        </table>
                            </div>
                        

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
crossorigin="anonymous"></script>
</body>
</html>