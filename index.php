<?php
require 'db_conn.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: indexx.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    
  <head>
     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
     form {
        border-style: ;
        border-style:;
  border-width: medium;
  position: relative;
  height: 370px;
  width: 30%;
  bottom: 0px;
  padding:  100px;
  font-size: 17px;
  line-height: 1.3;
  background-color: ;
  margin-left: auto; 
  margin-right: auto;
}

* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Timesnewroman;
  font-size: 20px;
}

#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}

.content {
  position: fixed;
  width: 100%;
  
  
}


#myBtn {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: none;
  background: #000;
  color: #fff;
  cursor: pointer;
}

#myBtn:hover {
  background: #ddd;
  color: black;
}
      </style>
  
    <meta charset="utf-8">
    <title>Login</title>
    
  </head>
  <body>
  <video autoplay muted loop id="myVideo">
  <source src="" type="video/mp4">

</video>
<div class="content">   
  <center><h2>login</h2></center>
  
    <form class="" action="" method="post" autocomplete="off">
      <center>
   
     <label for="usernameemail">Name : </label>
  
  
    
      <input type="text" name="usernameemail" id = "usernameemail" required value=""> <br>
  
 
      
      <label for="password">Password : </label>
  
      <input type="password" name="password" id = "password" required value=""> <br>
  
      
     <button type="submit" name="submit">submit</button>


</center>
<a href="registration.php" class="btn btn-success btn-sm">Register</a>
</div>
    </form>
  </table>
    <br>
   


  </body>
</html>