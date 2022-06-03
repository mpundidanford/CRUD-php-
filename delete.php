<?php
include "database.php";
$id = $_GET['id'];
$sql = "DELETE FROM `crud` WHERE id = $id";
$results = mysqli_query($conn, $sql);

if($results){
    header('location: index.php?msg=user deleted');
} 
else{
    echo "fail to delete" . mysqli_connect_errno();
}

?>