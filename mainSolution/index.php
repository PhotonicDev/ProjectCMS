<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Jquery</title>


    <link href="view/sass/main.css" type="text/css" rel="stylesheet">
</head>
<body>
<nav class="navbar-fixed-top navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


            <a class="navbar-brand" href="index.php"><img class="duckLogo" src="low_poly_duck.png">polyDuck</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>

                <li><a href="index.php?page=news">News</a></li>

            </ul>
            <form  class="navbar-form navbar-left">
                <div class="input-group">
                    <div class="form-group">
                        <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Search">
                    </div>
                    <span class="input-group-btn">
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </span>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a data-toggle="modal" data-target=".bs-example-modal-lg" class="loginModal">Login</a></li>
                <li><a class="sideClick" style="cursor:pointer;">Categories</a></li>

            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="wrapper">
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Login to our shop</h4>

                </div>
                <div class="modal-body">

                    <form class="" method="post" action="login.php">
                        <div class="directLogin">
                            <div class="form-group">

                                <label for="User email">Email address</label>
                                <input type="email" class="form-control" id="userEmail" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="User password">Password</label>
                                <input type="password" class="form-control" id="userPassword" placeholder="Password">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Login</button>
                        </div>
                        <div class="easyLogin">

                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <a class="additionalLogin" href="">Don't have an account?</a>
                    <a class="additionalLogin" href="">Forgot your password?</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="mainTile">
        <div id="result"></div>
        <div class="containerMain">
<?php
	include_once("controller/Controller.php");

	$controller = new Controller();
	$controller->invoke();

?>
            </div>
        </div>


        <div class="sideNavigation">
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
        </div>
    </div>
</div>

<script href="https://code.jquery.com/jquery-3.1.0.min.js"></script>

<script href="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" ></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link rel="script" href="js/jquery-3.1.1.min.js">
<link rel="script" href="js/bootstrap.js">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

<!-- Latest compiled and minified JavaScript -->
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="js/add.js" type="application/javascript"></script>


</body>
</html>

<script>
    $(document).ready(function(){
        $('#search_text').keyup(function(){
            var txt = $(this).val();
            if(txt != '')
            {
                $.ajax({
                    url:"fetch.php",
                    method:"post",
                    data:{search:txt},
                    dataType:"text",
                    success:function(data)
                    {
                        $('#result').html(data);
                    }
                });
            }
            else
            {
                $('#result').html('');
            }
        });
    });
</script>

