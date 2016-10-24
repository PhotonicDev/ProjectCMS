<?php


echo "

<div class='form-container'>

<h1 style='color:#fff;'>Contact us</h1>
<form name='contactform' method='post' action='view/send_form_email.php'>
  <div class='form-group'>
    <input type='text' class='form-control' id='exampleInputEmail1' name='first_name' placeholder='Name'>
  </div>
  
   <div class='form-group'>
    <input type='email' class='form-control' id='exampleInputEmail1' name='email' placeholder='Email'>
  </div>

  <textarea class='form-control' rows='3' name='comments' placeholder='Any comments?'></textarea>
  </div>
  <br>
  <button type='submit' class='btn btn-primary'>Send</button>
</form>

</div> <!--Form container ENDS -->

";

?>