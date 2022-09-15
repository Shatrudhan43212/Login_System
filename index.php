<?php 
    session_start(); 
    $email = $password = '';
    if(!empty($_COOKIE['email']) && !empty($_COOKIE['password'])){
        $email = $_COOKIE['email'];
        $password = $_COOKIE['password'];
    }
    if(isset($_SESSION['userdata'])){
        header("location: dashboard.php");
        die();
    }
    ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
    <style>
        .error{
            color: red !important;
        }
    </style>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <div class="mb-4">
              <h3>Sign In</h3>
            </div>
            <?= (isset($_SESSION['not_found'])) ? $_SESSION['not_found'] : ''; ?> 
                <?php unset($_SESSION['not_found']); ?>
            <form action="LoginProcess.php" method="post" id="myform">
            <label for="username">Email Address</label>
              <div class="form-group first">
              
                <input type="email" class="form-control" name= "email" id="email" required>
                </div>
                <?= (isset($_SESSION['email'])) ? $_SESSION['email'] : ''; ?> 
                <?php unset($_SESSION['email']); ?>
              <br>
              <label for="password">Password</label>
              <div class="form-group last mb-3">
                
                <input type="password" class="form-control" name="password" id="password" required>
              </div>
              <?= (isset($_SESSION['password'])) ? $_SESSION['password'] : ''; ?> 
                <?php unset($_SESSION['password']); ?>

               <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" id="remember_me" name="remember_me" checked onclick = "RememberPass()"/>
                  <div class="control__indicator"></div>
                </label>
                <!-- <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>   -->
              </div>
              <input type="submit" value="Log In" class="btn btn-block btn-primary">              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/query.validate.min.js"></script>
  </body>
</html>
<script>
     $("#myform").validate();

     function RememberPass(){
        let checked = document.getElementById("remember_me").checked;
        if(checked == true){
            document.getElementById('email').value = '<?= $email; ?>';
            document.getElementById('password').value = '<?= $password; ?>';
        }else{
            document.getElementById('email').value = '';
            document.getElementById('password').value = '';
        }
     }
     RememberPass();

</script>