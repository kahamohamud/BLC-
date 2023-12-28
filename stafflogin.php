<?php
session_start();
if (isset($_SESSION['message'])) {
    echo '<script>alert("' . $_SESSION['message'] . '");</script>';
    unset($_SESSION['message']);
}
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
<meta charset="UTF-8">
  <title>BLC</title>  

  <link rel="stylesheet" href="login.css">

</head>


 
<body>
<div class="overlay">
<div class="area" >
      <div class="navbar">
      <div>
        <a href='website.html'>
      </div>
      <nav>
        <ul >
        <img src="logo2.png" ></a>
          <li ><a href='#'>GUIDE </a></li>
          <li ><a href='#'>Need Support? </a></li>


        </ul>
      </nav>
    </div>

       
    
    <div id='login-form'class='login-page'>
            <div class="form-box">
              <!-- <img src="logo.png" ></a> -->
              <div class="txt">
                    <h2>Staff Login</h2>
              </div>
                
                <form id='login' class='input-group-login',  action="validate.php", method="POST">
                    <input type='text'class='input-field'placeholder='User Name' name='UserName' required >
		    <input type='password'  name='Password' class='input-field'placeholder='Password'  required>
		    <!-- <input type='checkbox' name='Password'class='check-box'><span>Remember Password</span> -->
		    <button type='submit'class='submit-btn'>Log in</button>
		 </form>

            </div>
        </div>
      </div>
</body>


</html>