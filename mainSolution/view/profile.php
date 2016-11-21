<?php
    $user = mysqli_fetch_array($profile);

?>
<form method="post">


    <div class="well">
     <h2>Username: <?php echo $user['name']; ?>      Email: <?php echo $user['email']; ?></h2>
    </div>
    <div class="well">
        <h2>Additional information</h2><br /><br />
        First name:
        <input name="firstName" type="text" value="<?php echo $user['firstName']; ?>"><br />
        Last name:
        <input name="lastName" type="text" value="<?php echo $user['lastName']; ?>"><br />
        Address:
        <input name="Address" type="text" value="<?php echo $user['Address']; ?>"><br />
        Birthday:
        <input name="birthDay" type="date" value="<?php echo $user['birth']; ?>"><br /><br />
        <button class="btn btn-primary" type="submit" name="update_profile">Update my profile</button>
    </div>
    <div class="well">
        <h2>Security</h2>
        Your current password: <input id="current_pass" name="current_pass" type="password"> <br />
        New password: <input id="new_pass" name="new_pass" type="password"> <br />
        Repeat new password: <input id="renew_pass" name="new_pass_re" type="password"> <br />
        <button class="btn btn-primary" type="submit" name="update_password">Update my password</button>

    </div>

    </form>
