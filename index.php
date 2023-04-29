<?php

  include 'db_con.php';

  $error_name = $error_email = $error_dept = "";

if(isset($_POST['add_student'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $dept = $_POST['dept'];

  if(empty($name)){
    $error_name = "name filled is required";
  }else if (empty($email)) {
    $error_email = "email filled is required";
  } else if(empty($dept)){
    $error_dept = "dept filled is required";
  } else {

    //  insert data into database table 
    $insert_data = "INSERT INTO student(name, email, dept) VALUES ('$name', '$email', '$dept')";

    // execution query syntex is mysqli_query(database connection variabe, insert query variable)
    $insert_exec = mysqli_query($conn, $insert_data);

    // check insert execution data massage
    if($insert_exec){
      echo "data insert is successfully";
    }else{
      echo "data insert is failed";
    }


  }

}


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


  <title>Student CRUD Operation</title>

</head>

<body>
 
<div class="container">
        <h1 class="bg-dark text-center p-2 text-white">Add Student </h1>

        <div class="row">
            <div class="col-lg-5">
               <form class="form" method="POST">
                <label for="">Enter student name</label>
                <input type="text" class="form-control" name="name">
                <span class="text-warning"><?php echo $error_name; ?></span> <br>
                <label for="">Enter student email</label>
                <input type="email" class="form-control" name="email">
                <span class="text-warning"><?php echo $error_email; ?></span> <br>
                <label for="">Enter student dept</label>
                <input type="text" class="form-control" name="dept">
                <span class="text-warning"><?php echo $error_dept; ?></span> <br>

                <button name="add_student" class="btn btn-primary p-2 mt-2">Add Student</button>
               </form>
            </div>
            
            <div class="col-lg-7">
               <table class="table">
                <thead>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>dept</th>
                    <th>edit</th>
                    <th>delete</th>
                </thead>
                <tbody>
                        <?php
                        // data read or select from database table 
                        $select_data = "SELECT * FROM student";
                        // execution query select data 
                        $select_exec = mysqli_query($conn, $select_data);

                        $count = 1;

                        // data fetch from database table by while loop
                        while($row = mysqli_fetch_assoc($select_exec)){ ?>
                        <tr>
                          <td><?php echo $count++ ?></td>
                          <td><?php echo $row['name'] ?></td>
                          <td><?php echo $row['email'] ?></td>
                          <td><?php echo $row['dept'] ?></td>
                          <td><a href="edit.php?updateIdNo=<?php echo $row['id'] ?>"><button class="btn btn-success">Edit</button></a></td>
                          <td><a onclick="return confirm('Are You Sure?')" href="delete.php?deleteIdNo=<?php echo $row['id'] ?>"><button class="btn btn-warning">Delele</button></a></td>
                        </tr>
                         
                       <?php }
                        ?>

                 
                </tbody>
               </table>
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