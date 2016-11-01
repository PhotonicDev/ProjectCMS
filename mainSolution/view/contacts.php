<?php
$show = '';
if(mysqli_num_rows($contacts) > 0) {
    while ($cont = mysqli_fetch_array($contacts)) {

        $show .= '<form method=\'post\' enctype=\'multipart/form-data\'>
<div class=\'descbox\'>
<label for="comment"><h2>Contact info</h2></label><br><br>
<div class="form-group">
 <label for="comment"><h3>Address</h3></label><br><br>
 <label for="comment">StreetName and number</label>
  <input type="text" name=\'cont_street\' value="' . $cont['Street'] . '" class="form-control" id="usr">
   <label for="comment">Zip/Postal Code</label>
  <input type="text" name=\'cont_code\' value="' . $cont['zipcode'] . '" class="form-control" id="usr">
   <label for="comment">City</label>
  <input type="text" name=\'cont_city\' value="' . $cont['city'] . '" class="form-control" id="usr">
  <label for="comment">Country</label>
  <input type="text" name=\'cont_country\' value="' . $cont['country'] . '" class="form-control" id="usr"><br><br><br>
  <label for="comment">Any extra description text to display?</label>
  <textarea name="cont_text"  class="form-control" id="comment">' . $cont['description'] . '</textarea>
   <label for="comment">Company email</label>
  <input type="text" name=\'cont_email\' value="' . $cont['email'] . '" class="form-control" id="usr">
    <label for="comment">Company Phone number</label>
  <input type="text" name=\'cont_phone\' value="' . $cont['Phone'] . '" class="form-control" id="usr">
</div><br><br>
<label for="comment"><h3>Working hours</h3></label><br><br>
  <label for="comment">Monday</label>
  <input type="text" name=\'cont_monday\' value="' . $cont['monday'] . '" class="form-control" id="usr">
    <label for="comment">Tuseday</label>
  <input type="text" name=\'cont_tuesday\' value="' . $cont['tuesday'] . '" class="form-control" id="usr">
    <label for="comment">Wednesday</label>
  <input type="text" name=\'cont_wednesday\' value="' . $cont['wednesday'] . '" class="form-control" id="usr">
    <label for="comment">Thursday</label>
  <input type="text" name=\'cont_thursday\' value="' . $cont['thursday'] . '" class="form-control" id="usr">
    <label for="comment">Friday</label>
  <input type="text" name=\'cont_friday\' value="' . $cont['friday'] . '" class="form-control" id="usr">
    <label for="comment">Saturday</label>
  <input type="text" name=\'cont_saturday\' value="' . $cont['saturday'] . '" class="form-control" id="usr">
    <label for="comment">Sunday</label>
  <input type="text" name=\'cont_sunday\' value="' . $cont['sunday'] . '" class="form-control" id="usr">

<br><br>
<button type="submit" name="btn-contact-update"  class="pull-right btn-sm btn btn-primary">Update <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</form></div>
<br><br>';
    }
    echo $show;

}





