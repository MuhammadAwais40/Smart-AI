
<?php 
   session_start();
?>

<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Login</title>
   <link rel="stylesheet" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="style.css">
   <link rel="icon" type="image/png" href="img/favicon.png">
</head>
<body>

<style>
 body {
    font-family: Arial, sans-serif;
    background-color: #73a9cd;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-image: url("");
    background-color: rgba(0,0,0,0.1);
}

.container{
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 90vh;
}
.box{
    background: #fdfdfd;
    display: flex;
    flex-direction: column;
    padding: 25px 25px;
    border-radius: 20px;
    box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
                0 32px 64px -48px rgba(0,0,0,0.5);
    border-top: 6px solid #007bff;
    border-bottom: 6px solid #007bff;
    border-left: 6px solid #007bff;
    border-right: 6px solid #007bff;
}
.form-box{
    width: 450px;
    margin: 0px 10px;
}
.form-box header{
    font-size: 25px;
    font-weight: 600;
    padding-bottom: 10px;
    border-bottom: 1px solid #e6e6e6;
    margin-bottom: 10px;
}
.form-box form .field{
    display: flex;
    margin-bottom: 10px;
    flex-direction: column;

}
.form-box form .input input{
    height: 40px;
    width: 100%;
    font-size: 16px;
    padding: 0 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    outline: none;
}
.btn{
    height: 35px;
    background: #0056b3;
    border: 0;
    border-radius: 5px;
    color: #fff;
    font-size: 15px;
    cursor: pointer;
    transition: all .3s;
    margin-top: 10px;
    padding: 0px 10px;
}
.btn:hover{
    opacity: 0.82;
}
.footer {
      background-color: #ffff;
      color: #0056b3;
      padding: 5px;
      text-align: center;
      position: absolute;
      bottom: 0;
      width: 60%;
      border: 2px solid #0ea73d;
      border-radius: 12px; /* Rounded top corners */
      margin-bottom: 10px;
    }

 
    </style>

<div class="container">
        <div class="box form-box">
            <?php 
             
              include("config.php");
              if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $password = mysqli_real_escape_string($con,$_POST['password']);

                $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") 
                or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['id'] = $row['Id'];
                }else{
                    echo "<div class='message'>
                      <p style='color: red;'>Wrong Username or Password</p>
                       </div> <br>";
                   echo "<a href='login.php'><button class='btn'>Go Back</button>";
         
                }
                if(isset($_SESSION['valid'])){
                    header("Location: search.html");
                }
              }else{

            
            ?>
            <header><img src="img/ai.png" style="
              height: 60px;
              width: 80px;"> Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email"> <i class="fa fa-envelope" aria-hidden="true"></i> Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password"> <i class="fa fa-unlock-alt" aria-hidden="true"></i> Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
      <footer class="footer">
    <p>&copy; 2024 <a href="#"> AI Smart Learn.</a> All rights reserved.</p>
  </footer>

</body>
</html>
