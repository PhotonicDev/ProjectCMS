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
            <a class="navbar-brand" href="/ProjectCMS/main/index"><img class="duckLogo" src="../../ProjectCMS/assets/user_images/duck_yellow.png">polyDuck</a>


        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/ProjectCMS/main/index"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>

                <li><a href="/ProjectCMS/main/news"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span></a></li>

                <li><a href="/ProjectCMS/main/info"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a></li>

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
                    if(session::check("username")){
                        echo "
                          <li><a href='/ProjectCMS/main/profile'><span class='glyphicon glyphicon-user' aria-hidden='true'></span></a></li>
                          <li><a href='/ProjectCMS/main/basket'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span></a></li>
                          <li><a href='/ProjectCMS/main/logout' ><span class='glyphicon glyphicon-log-out' aria-hidden='true'></span></a></li>";
                    }
                    else {
                        echo   "<li><a data-toggle='modal' data-target='.bs-example-modal-lg' class='loginModal'><span class='glyphicon glyphicon-log-in' aria-hidden='true'></span></a></li>
                         <li><a href='/ProjectCMS/main/basket'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span></a></li>";
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
                    <a class="additionalLogin" href="/ProjectCMS/main/register">Don't have an account?</a>
                    <a class="additionalLogin" href="/ProjectCMS/main/forgot">Forgot your password?</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="mainTile">
        <img class="background" alt="web shop background autumn" src="/ProjectCMS/assets/web_images/back.gif"/>

        <?php
        //include 'view/partials/categories.php';
        ?>

        <div class="containerMain">

            <div id="static" class="staticItems slideAn">
