<?php
include_once 'controller/Controller.php';
include_once 'controller/load.php';
include_once ("analytics_tracking.php");
session_start();
$controller = new Controller();
$controller->listProducts();

if(empty($_SESSION['prep'])){

    if(isset($_COOKIE['temp'])) {
    $_SESSION['temp_id'] =  $_COOKIE['temp'];
    load_temp($_SESSION['temp_id']);
    $_SESSION['prep'] = 'yes';
}
elseif(isset($_COOKIE['user'])){
    $_SESSION['user_id'] =  $_COOKIE['user'];
    load($_SESSION['user_id']);
    $_SESSION['prep'] = 'yes';
}
else {
    create_new();
    $_SESSION['prep'] = 'yes';

}
}
function Connect(){

    $db = require('model/conn.php');
    $connection = new Database($db);
    return $connection;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Duck - Web Shop</title>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" ></script>

    <script rel="script" src="controller/js/jquery-3.1.1.min.js"></script>
    <script rel="script" src="controller/js/bootstrap.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="controller/js/cookieQuery.js" rel="script"></script>

    <link href="view/sass/main.css" type="text/css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='view/sass/css/contactform.css'>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script> <!--reCAPTCHA API JavaScript library-->
</head>
<body>
<nav id="navigation" class="navbar-fixed-top navbar">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img class="duckLogo" src="user_images/duck_yellow.png">polyDuck</a>


        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>

                <li><a href="index.php?page=news"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span></a></li>

                <li><a href="index.php?page=contacts"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a></li>

            </ul>
            <form class="navbar-form navbar-left"> <!-- search bar-->
                <div class="input-group">
                    <div class="form-group">
                        <input type="text" name="search_text" id="search_text" class="form-control" placeholder="I'm searching for...">
                    </div>
                    <span class="input-group-btn">
        <button type="button" class="search_button btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </span>
                </div>
            </form><!-- search bar-->
            <form method="post">

            <ul class="nav navbar-nav navbar-right">
                <?php
                if(isset($_SESSION['username'])){
                    echo "
                          <li><a href='index.php?page=profile'><span class='glyphicon glyphicon-user' aria-hidden='true'></span></a></li>
                          <li><a href='index.php?page=basket'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span></a></li>
                          <li><a href='controller/logout.php' ><span class='glyphicon glyphicon-log-out' aria-hidden='true'></span></a></li>";
                }
                else {
                 echo   "<li><a data-toggle='modal' data-target='.bs-example-modal-lg' class='loginModal'><span class='glyphicon glyphicon-log-in' aria-hidden='true'></span></a></li>
                         <li><a href='index.php?page=basket'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span></a></li>";
                }

?>

            </ul>
            </form>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="wrapper container">
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Login to our shop</h4>

                </div>
                <div class="modal-body">

                    <form method="post">
                        <div class="directLogin">
                            <div class="form-group">

                                <label for="User name">Username</label>
                                <input name="username" type="text" class="form-control" id="userName" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="User password">Password</label>
                                <input name="password" type="password" class="form-control" id="userPassword" placeholder="Password">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                            <button name="login" type="submit" class="btn btn-default">Login</button>
                        </div>
                        <div class="easyLogin">

                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <a class="additionalLogin" href="index.php?register=y">Don't have an account?</a>
                    <a data-toggle='modal' data-target='.bs-example-modal-lg1' class='loginModal'>Forgot your password?</a>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade bs-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <?php
        include "model/conn.php";
        include_once ("view/error_view/note.php");
        $co = mysqli_connect($host,$user,$pass);
        if (!$co){
            die("Database Connection Failed" . mysqli_error($co));
        }
        $select_db = mysqli_select_db($co,$dbName);
        if (!$select_db){
            die("Database Selection Failed" . mysqli_error($co));
        }

        if (isset($_POST['Email'])){
            $email = $_POST['Email'];
            $query="SELECT * FROM `customers` WHERE email='$email'";
            $result   = mysqli_query($co, $query) or die(mysqli_error($co));
            $count=mysqli_num_rows($result);
            // If the count is equal to one, we will send message other wise display an error message.
            if($count==1)
            {
                $rows=mysqli_fetch_array($result);

                $name = $rows ['name'];
                $pass  =  $rows['password'];//FETCHING PASS
                //echo "your pass is ::".($pass)."";
                $to = $rows['email'];
                //echo "your email is ::".$email;
                //Details for sending E-mail
                $from = "Duck Shop";
                $url = "http://www.examserver38.dk";
                $body  =  "<b>Duck-Shop password recovery</b><Br> 
		                   ---------------------------<br>
		Url : $url;<br>
		your username : <b>$name</b> <br>
		your email : $to;<br>
		Here is your password  : <b>$pass</b> <Br><br>
		Sincerely,<Br>
		Duck-Shop -- examserver38.dk";
                $from = "ducks@examserver38.dk";
                $subject = "DuckShop Password recovered";
                $headers1 = "From: $from\n";
                $headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
                $headers1 .= "X-Priority: 1\r\n";
                $headers1 .= "X-MSMail-Priority: High\r\n";
                $headers1 .= "X-Mailer: Just My Server\r\n";
                $sentmail = mail ( $to, $subject, $body, $headers1 );
            } else {
                if ($_POST ['email'] != "") {

                    error('Not found your email in our database');
                }
            }
            //If the message is sent successfully, display sucess message otherwise display an error message.
            if($sentmail==1)
            {

                note('Your Password Has Been Sent To Your Email Address.');
            }
            else
            {
                if($_POST['email']!="")

                error('Cannot send password to your e-mail address.Problem with sending mail...');
            }
        }


        ?>


        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Password recovery</h4>

                </div>
                <div class="modal-body">

                    <form method="post">
                        <br>
                        <br>
                        <h2 class="form-signin-heading">Your username</h2>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"></span>
                            <input type="email" name="Email" class="form-control" placeholder="Email" required>
                        </div>
                        <br />
                        <br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Send me password</button>

                    </form>

                </div>
                <div class="modal-footer">
                    <a class="additionalLogin" href="index.php?register=y">Don't have an account?</a>


                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="mainTile">
        <?php

        //include 'view/partials/categories.php';

        ?>


        <div class="containerMain">

                <div id="static" class="staticItems slideAn">
                    <?php
                        $controller->invoke();
                    ?>
                </div>
                <div id="dynamic" class="staticItems slideAn">

                </div>
            </div>

        </div>

        <div class="background"></div>


      <!--  <div class="sideNavigation">
            <div class="container-fluid sideWrap">
                <div class="categoryTitle"><h4>General</h4></div>
                <ul class="list-group">
                    <li class="list-group-item"><a>Themed</a></li>
                    <li class="list-group-item"><a>Rare</a></li>
                    <li class="list-group-item"><a>Weird</a></li>
                </ul>
                <div class="categoryTitle"><h4>Fabric</h4></div>
                <ul class="list-group">
                    <li class="list-group-item"><a>Metal</a></li>
                    <li class="list-group-item"><a>Ceramic</a></li>
                    <li class="list-group-item"><a>Rubber</a></li>
                    <li class="list-group-item"><a>Wood</a></li>
                </ul>
            </div>
        </div>-->
    </div>



<script>

</script>
 <script>
     function swingIn(output){
         $('#static').hide( 500 ,"swing");
         $('#dynamic').html(output).show( 500 ,"swing");
     }
     function swingOut(){
         $('#dynamic').hide( 500 ,"swing").html('');
         $('#static').show( 500 ,"swing");
     }
    $(document).ready(function(){
        $('#search_text').keyup(function(){
            var search = $(this).val();
            var txt =  new RegExp(search, 'i');
            if(search != '') {
                $.getJSON("data.json", {name: txt}) .done(function(data){
                    var output = '';
                    var count = 0;
                    $.each(data, function (key, val) {
                        if ((val.name.search(txt) != -1) || (val.tags.search(txt) != -1)) {
                            output += '<div class="items">' +
                                '<a href="index.php?product=' + val.name + '">' +
                                '<div class="itemWhite">' +
                                '<img class="itemPicture" src="' + val.images + '">' +
                                '</div>' +
                                '<div class="itemInfoHide caption">' +
                                '<div class="transitionInformation">' +
                                '<h4>' +
                                '<strong>' + val.name + '</strong>' +
                                '</h4>' +
                                '<div class="pricey">' +
                                '<h4>' + val.price + ' DKK</h4>' +
                                '<img src="red.png" class="stick">' +
                                '</div>' +
                                '<div class="otherInformation">' +
                                'Size:<strong>' + val.size + '</strong><br>' +
                                'Color:<strong>' + val.color + '</strong><br>' +
                                'From:<strong>' + val.manufacture + '</strong><br>' +
                                'Category:<strong>' + val.material + '</strong><br>' +
                                'Tags:<strong>' + val.tags + '</strong><br>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</a>' +
                                '</div>';
                            count++;
                        }
                    });
                    if(count == 0){
                        output += '<div class="notFound jumbotron">' +
                            '<div class="container">' +
                            '<h2>No items where found according to your search: <strong>' + search + '</strong></h2>' +
                            '</div>' +
                            '</div>';

                    }
                    swingIn(output);
                });

            }
            else
            {
                swingOut();
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
       var scroll_start = 0;
        var startChange = $('.mainTile');
        var offset = startChange.offset();
        if(startChange.length) {
            $(document).scroll(function(){
                scroll_start = $(this).scrollTop();
                if(scroll_start > offset.top) {
                    $("#navigation").addClass("fancyNav");
                }
                else {
                    $("#navigation").removeClass("fancyNav");
                }
            });
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#cart').on('click', function () {
            $.ajax({
                url: "controller/fetch.php",
                method: "get",
                data: {cart:<?php echo $_SESSION['LOC'][1]; ?>},
                dataType: "text",
                success: function () {
                    $('#cart').html('Added');
                }
            });
        });
    });
</script>
<script>

    $(document).ready(function() {
            <?php
        if(empty($_SESSION['up'])){
            $_SESSION['up'] = array();

        }
        ?>
        var voted = '<?php echo in_array($_SESSION['LOC'][1],$_SESSION['up']); ?>';

        if( voted == false ){
        $('#up').on('click', function () {
            $.ajax({
                url: "controller/fetch.php",
                method: "get",
                data: {vote:<?php echo $_SESSION['LOC'][1]; ?>},
                dataType: "text",
                success: function () {
                    $('#up').html('Up voted').attr('disabled','disabled');
                    location.reload();
                }
            });
        });
        }
        else {
            $('#up').html('Up voted').attr('disabled','disabled');
        }
    });

</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="controller/js/add.js" type="application/javascript"></script>
</body>
</html>
