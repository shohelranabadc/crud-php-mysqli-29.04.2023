<?php

    include "db_con.php";

    $studentIdNo = $_GET['updateIdNo'];

    $select_studentId = "SELECT * FROM student WHERE id = $studentIdNo";

    // execution 
    $select_exec = mysqli_query($conn, $select_studentId);

    // full row selection data or get data by the  execution id ($select_exec)
    $row = mysqli_fetch_assoc($select_exec);


    // update data submition part
    if(isset($_POST['update_student'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $dept = $_POST['dept'];

      // update query data into database
      $update_data = "UPDATE student SET 
      name = '$name', email = '$email', dept = '$dept' WHERE id = '$studentIdNo'";
      // execution update data
      $update_exec = mysqli_query($conn, $update_data);

      if($update_exec){
        echo "Data update is successfully";
      }else{
        echo "Data update is failed";
      }

      header("location: index.php");

    };






?>





<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


  <title>student information</title>

</head>

<body>
 
<div class="container">
        <h1 class="bg-dark text-center p-2 text-white">Update Student </h1>

        <div class="row">
            <div class="col-lg-12">

            <form class="form" method="POST">
                <label for="">Enter student name</label>
                <input value="<?php echo $row['name'] ?>" type="text" class="form-control" name="name"><br>
                <label for="">Enter student email</label>
                <input value="<?php echo $row['email'] ?>" type="email" class="form-control" name="email"><br>
                <label for="">Enter student dept</label>
                <input value="<?php echo $row['dept'] ?>" type="text" class="form-control" name="dept"><br>
                <button name="update_student" class="btn btn-primary p-2 mt-2">Update Student</button>
               </form>
            </div>
               
        </div>
</div>
            
  

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  
  
</body>

</html>