<?php

include 'db_con.php';

$deleteIdNo = $_GET['deleteIdNo'];

// delete id query from database table
$deleteId = "DELETE FROM student WHERE id = $deleteIdNo";

// execution for delete id
$delete_exec = mysqli_query($conn, $deleteId);

if($delete_exec){
    echo "Delete is successfully";
}else{
    echo "Delete is failed";
}

header("location: index.php");





?>