
<!DOCTYPE html>
<html>
  <head>
    <link href="stylesheet.css" type="text/css" rel="stylesheet"/>
  </head>
<body>

<div id="id01" class="modal">

  <form class="modal-content animate" action="login.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="lock.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>

      <button type="submit" name="submit">Login</button>
      <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <a href="register_form.php"> <button type="button" class="cancelbtn">Register</button></a>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

</body>
</html>

