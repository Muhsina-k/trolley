<?php
include 'connection.php';
session_start();
if(isset($_SESSION['username']))
{
	header('location:dashboard.php');
}
if(isset($_POST['button']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$result=mysqli_query($con,"SELECT  *
	FROM `registration_table` WHERE  username ='$username'AND password ='$password'");
	if(mysqli_num_rows($result)==1)
	{
		$row_data= mysqli_fetch_assoc($result);
		$_SESSION['username']=$row_data['login_id'];
		header('location:dashboard.php');
    }
    else
	{
        echo" <script> alert('you have entered incorrect password or username' );
       
        </script>";
    }


}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>SMART TROLLEY</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">
        <div class="input-group mb-3">
           
        <input type="text" class="form-control" id="username" name="username" placeholder="username">
            <span id="unameerror" style="color: red"></span><br>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          
          <input type="password" class="form-control" id="password" name="password"
          placeholder="Password">
          <span id="passworderror" style="color: red"></span><br>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit"  name="button"class="btn btn-primary btn-block" onclick="return valid();">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>


<script type="text/javascript">
  function valid()
  {
    var username=document.getElementById('username').value;
    var password=document.getElementById('password').value;
    if (username=="")
{
  document.getElementById('unameerror').innerHTML="username required";
  return false;
}
if (password=="")
{
  document.getElementById('passworderror').innerHTML="password required";
  return false;
}


  }
</script>


<?php
include'connection.php';


if (isset($_POST['submit'])) 
{
  $username=$_POST['username'];
  $password=$_POST['password'];
  $result=mysqli_query($con,"SELECT `Username`, `Password` FROM `registration_table` WHERE username='$username'AND password='$password'");
  if(mysqli_num_rows($result)==1)
  {
    header('location:dashboard.php');
  }
  else
  {
    echo "<script> alert(you entered incorrect password);</script>";
    exit();
  }

}
  ?>
