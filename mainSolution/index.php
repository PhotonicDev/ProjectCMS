<?php
include_once 'controller/Controller.php';
include_once 'controller/load.php';
session_start();
$controller = new Controller();
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
                    <a class="additionalLogin" href="index.php?forgot=y">Forgot your password?</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="mainTile">
        <div class="secondary-nav container-fluid">
            <nav class="navbar">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li><a href="index.php">All</a></li>
                            <li role="presentation"><a href="#Color" aria-controls="Color" role="tab" data-toggle="tab">Color</a></li>
                            <li role="presentation"><a href="#Material" aria-controls="Material" role="tab" data-toggle="tab">Material</a></li>
                            <li role="presentation"><a href="#Price" aria-controls="Price" role="tab" data-toggle="tab">Price</a></li>
                            <li role="presentation"><a href="#Size" aria-controls="Size" role="tab" data-toggle="tab">Size</a></li>
                            <li role="presentation"><a href="#Country" aria-controls="Country" role="tab" data-toggle="tab">Country</a></li>
                            <li role="presentation"><a href="#Manufacturer" aria-controls="Manufacturer" role="tab" data-toggle="tab">Manufacturer</a></li>
                            <li role="presentation"><a href="#Instock" aria-controls="Instock" role="tab" data-toggle="tab">In stock</a></li>
                            <li role="presentation"><a href="#Year" aria-controls="Year" role="tab" data-toggle="tab">Year</a></li>
                            <li role="presentation"><a href="#Popularity" aria-controls="Popularity" role="tab" data-toggle="tab">Popularity</a></li>
                            <li role="presentation"><a href="#Top" aria-controls="Top" role="tab" data-toggle="tab">Top</a></li>

                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="well tab-pane" id="Color">
                                <a class="btn btn-lg btn-primary" href="#">Red</a>
                                <a class="btn btn-lg btn-primary" href="#">Blue</a>
                                <a class="btn btn-lg btn-primary" href="#">Green</a>
                                <a class="btn btn-lg btn-primary" href="#">Yellow</a>
                                <a class="btn btn-lg btn-primary" href="#">Purple</a>
                                <a class="btn btn-lg btn-primary" href="#">Orange</a>
                                <a class="btn btn-lg btn-primary" href="#">White</a>
                            </div>
                            <div role="tabpanel" class="well tab-pane" id="Material">
                                <a class="btn btn-lg btn-primary" href="#">Metal</a>
                                <a class="btn btn-lg btn-primary" href="#">Wood</a>
                                <a class="btn btn-lg btn-primary" href="#">Silicon</a>
                                <a class="btn btn-lg btn-primary" href="#">Rubber</a>
                                <a class="btn btn-lg btn-primary" href="#">PVC</a>
                                <a class="btn btn-lg btn-primary" href="#">Quick silver</a>
                                <a class="btn btn-lg btn-primary" href="#">Mercury</a>
                            </div>
                            <div role="tabpanel" class="well tab-pane" id="Price">
                                <a class="btn btn-lg btn-primary" href="#">0.99-2.99</a>
                                <a class="btn btn-lg btn-primary" href="#">2.99-4.99</a>
                                <a class="btn btn-lg btn-primary" href="#">4.99-7.99</a>
                                <a class="btn btn-lg btn-primary" href="#">7.99-9.99</a>
                                <a class="btn btn-lg btn-primary" href="#">9.99-12.99</a>
                                <a class="btn btn-lg btn-primary" href="#">12.99-14.99</a>
                                <a class="btn btn-lg btn-primary" href="#">14.99-17.99</a>
                            </div>
                            <div role="tabpanel" class="well tab-pane" id="Size">
                                <a class="btn btn-lg btn-primary" href="#">XS</a>
                                <a class="btn btn-lg btn-primary" href="#">S</a>
                                <a class="btn btn-lg btn-primary" href="#">M</a>
                                <a class="btn btn-lg btn-primary" href="#">L</a>
                                <a class="btn btn-lg btn-primary" href="#">XL</a>
                                <a class="btn btn-lg btn-primary" href="#">XXL</a>
                                <a class="btn btn-lg btn-primary" href="#">XXXL</a>
                            </div>
                            <div role="tabpanel" class="well tab-pane" id="Country">
                                <a class="btn btn-lg btn-primary" href="#">China</a>
                                <a class="btn btn-lg btn-primary" href="#">Denmark</a>
                                <a class="btn btn-lg btn-primary" href="#">Germany</a>
                                <a class="btn btn-lg btn-primary" href="#">Estonia</a>
                                <a class="btn btn-lg btn-primary" href="#">Japan</a>
                                <a class="btn btn-lg btn-primary" href="#">America</a>
                                <a class="btn btn-lg btn-primary" href="#">Canada</a>
                            </div>
                            <div role="tabpanel" class="well tab-pane" id="Manufacturer">
                                    <a class="btn btn-lg btn-primary" href="#">China</a>
                                    <a class="btn btn-lg btn-primary" href="#">Denmark</a>
                                    <a class="btn btn-lg btn-primary" href="#">Germany</a>
                                    <a class="btn btn-lg btn-primary" href="#">Estonia</a>
                                    <a class="btn btn-lg btn-primary" href="#">Japan</a>
                                    <a class="btn btn-lg btn-primary" href="#">America</a>
                                    <a class="btn btn-lg btn-primary" href="#">Canada</a>
                            </div>
                            <div role="tabpanel" class="well tab-pane" id="Instock">
                                    <a class="btn btn-lg btn-primary" href="#">China</a>
                                    <a class="btn btn-lg btn-primary" href="#">Denmark</a>
                                    <a class="btn btn-lg btn-primary" href="#">Germany</a>
                                    <a class="btn btn-lg btn-primary" href="#">Estonia</a>
                                    <a class="btn btn-lg btn-primary" href="#">Japan</a>
                                    <a class="btn btn-lg btn-primary" href="#">America</a>
                                    <a class="btn btn-lg btn-primary" href="#">Canada</a>
                            </div>
                            <div role="tabpanel" class="well tab-pane" id="Year">
                                    <a class="btn btn-lg btn-primary" href="#">China</a>
                                    <a class="btn btn-lg btn-primary" href="#">Denmark</a>
                                    <a class="btn btn-lg btn-primary" href="#">Germany</a>
                                    <a class="btn btn-lg btn-primary" href="#">Estonia</a>
                                    <a class="btn btn-lg btn-primary" href="#">Japan</a>
                                    <a class="btn btn-lg btn-primary" href="#">America</a>
                                    <a class="btn btn-lg btn-primary" href="#">Canada</a>
                            </div>
                            <div role="tabpanel" class="well tab-pane" id="Popularity">
                                    <a class="btn btn-lg btn-primary" href="#">China</a>
                                    <a class="btn btn-lg btn-primary" href="#">Denmark</a>
                                    <a class="btn btn-lg btn-primary" href="#">Germany</a>
                                    <a class="btn btn-lg btn-primary" href="#">Estonia</a>
                                    <a class="btn btn-lg btn-primary" href="#">Japan</a>
                                    <a class="btn btn-lg btn-primary" href="#">America</a>
                                    <a class="btn btn-lg btn-primary" href="#">Canada</a>
                            </div>
                            <div role="tabpanel" class="well tab-pane" id="Top">
                                    <a class="btn btn-lg btn-primary" href="#">China</a>
                                    <a class="btn btn-lg btn-primary" href="#">Denmark</a>
                                    <a class="btn btn-lg btn-primary" href="#">Germany</a>
                                    <a class="btn btn-lg btn-primary" href="#">Estonia</a>
                                    <a class="btn btn-lg btn-primary" href="#">Japan</a>
                                    <a class="btn btn-lg btn-primary" href="#">America</a>
                                    <a class="btn btn-lg btn-primary" href="#">Canada</a>
                            </div>
                        </div>

                    </div><!-- /.navbar-collapse -->
            </nav>
        </div>
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
    $(document).ready(function(){
        $('#search_text').keyup(function(){
            var txt = $(this).val();
            if(txt != '')
            {
                $.ajax({
                    url:"controller/fetch.php",
                    method:"get",
                    data:{search:txt},
                    dataType:"text",
                    success:function(data)
                    {   $('#static').hide( 500 ,"swing");
                        $('#dynamic').html(data).show( 500 ,"swing");

                    }
                });
            }
            else
            {
                $('#dynamic').hide( 500 ,"swing").html('');
                $('#static').show( 500 ,"swing");
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
