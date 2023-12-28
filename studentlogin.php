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
          <img src="logo.png" ></a>
      </div>
      <nav>
        <ul >
          <li > <a href="https://britannia.edu.my/">Visit OUR wbsite </a></li>
          <li ><a href='#'>GUIDE </a></li>
          <li ><a href='#'>Need Support? </a></li>


        </ul>
      </nav>
    </div>

       
    
    <div id='login-form'class='login-page'>
            <div class="form-box">
              <div class="txt">
                    <h2>Student Login</h2>
              </div>
                
                <form id='login' class='input-group-login',  action="validatestudent.php", method="POST">
                    <input type='text'class='input-field'placeholder='Passport No' name='ID' required >

        <button type='submit'class='submit-btn'>Log in</button>
        <p>Note: do not share your passport number with anyone else for safety purposes.</p>
     </form>

            </div>
            
        </div>
      </div>
</body>

</html>