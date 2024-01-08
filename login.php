<?php
include("connection.php");
?>
<?php

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password)){
        $select = "SELECT * FROM `signup` WHERE `email` = ? LIMIT 1";
        $stmt = mysqli_prepare($connection, $select);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                if ($row['password'] == $password) {
                   header('Location:dashboard.php');
                } else {
                    echo "Wrong Credentials..!";
                }
            } else {
                echo "Wrong Credentials..!";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Failed to prepare statement.";
        }
    } else {
        echo "Email and password cannot be empty.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
 <div class="container">
     <form class="row" method="POST" >
     <div class="col-md-10 mt-5 offset-3 ">
            <h1 class="offset-2 mb-4 text-primary">Log In </h1>
  <div class="col-md-6">
    <label for="validationCustom01" class="form-label"><strong>Email</strong></label>
    <input type="email" class="form-control" id="validationCustom01" value="" name="email">
  </div><br>
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label"><strong>Password</strong></label>
    <input type="password" class="form-control" id="validationCustom02" value="" name="password">
  </div><br>

<div class="row">
    <div class="col-4">

      <button class="btn btn-primary" type="submit" name="submit">Log In</button>
    </div>
</div>


</form>
        </div>

 </div>
 </div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>