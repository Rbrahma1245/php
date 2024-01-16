<?php

if(isset($_POST['submit'])){
    // getting and storing inputs in variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    //database details. we have created these details in the PHP my admin.
    $host = "localhost";
    $username = "formdb_user";
    $password = "abc123";
    $dbname = "form";

    //create connection
    $con = mysqli_connect($host, $username, $password, $dbname);
    //check connection if it is working or not
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }

      // Check if email already exists
      $checkEmailQuery = "SELECT COUNT(*) as count FROM signup WHERE email = '$email'";
      $checkEmailResult = mysqli_query($con, $checkEmailQuery);
      $emailExists = mysqli_fetch_assoc($checkEmailResult)['count'];
  
      if ($emailExists > 0) {
          // Email already exists, show error message
          echo '<script>alert("Email already exists. Please choose a different email!")</script>';
          
       
      } else {
          // Email doesn't exist, proceed with the INSERT query
          $sql = "INSERT INTO signup (id, name, email, password) VALUES ('0', '$name', '$email', '$password')";
  
          // fire query to save entries and check it with if statement
          $rs = mysqli_query($con, $sql);
  
          if ($rs) {
              echo "Message has been sent successfully!";
              echo '<script>alert("You have successfully registered")</script>';
              header("Location: ../Login/login.html");
          } else {
              echo "Error, Message didn't send! Something's Wrong.";
          }
        }
}

?>