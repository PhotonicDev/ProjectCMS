<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
$GLOBALS['config'] = array(
    "appName" => "polyDuck",
    "version" => "0.0.1",
    "domain" => "ProjectCMS",
    "cache_enabled" => true,
    "path" => array(
        "app" => "app/",
        "index" => "index.php",
        "cache" => "caches/",
        "session" => "app/sessions",
        "basePath" => "C:/wamp64/www/ProjectCMS/"
    ),
    "default" => array(
        "controller" => "main",
        "method" => "index"
    ),
    "routes" => array(),
    "database" => array(
        "host" => "localhost",
        "username" => "root",
        "password" => "123",
        "name" => "db_cms"
    )
);
date_default_timezone_set("Europe/Copenhagen");
$GLOBALS["instances"] = array();
require_once $GLOBALS["config"]["path"]["app"]."autoload.php";

?>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>polyDuck - Web Shop</title>


    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--<script src="/ProjectCMS/assets/js/bootstrap.js"></script>
    <script src="/ProjectCMS/assets/js/jquery-3.1.1.min.js"></script>
 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script> <!--reCAPTCHA API JavaScript library-->

    <link href="/ProjectCMS/assets/sass/main.css" type="text/css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='/ProjectCMS/assets/sass/css/contactform.css'>

</head>
<body>
<div class="row">

<?php
new router();
?>
</div>
<?php
if(session::get("error") != ""){
    $output = "";
    switch (session::get("error")) {
        case 1;
            $output = "Incorrect username or password";
            break;
        case 2;
            $output = "Username does not exist";
            break;
        case 3;
            $output = "Something went wrong or you tried to access a page that does not exist!";
            break;
        case 4;
            $output = "Name is already in use!";
            break;
        case 5;
            $output = "Email is already used by someone else";
            break;
        case 6;
            $output = "Server internal error";
            break;
        case 7;
            $output = "You must be logged in to update your profile";
            break;
        case 8;
            $output = "Passwords doesn't match";
            break;
        case 9;
            $output = "You've entered wrong password";
            break;
        case 10;
            $output = "Complete the reCAPTCHA first";
            break;
        case 11;
            $output = "No item selected";
            break;

    }
    session::set("error","");
    echo "<div class='container'>
                    <div class='errorResponse alert alert-dismissible alert-danger' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                        <strong>Oh Snap! " . $output . "!</strong>
                    </div>
                </div>";
}
?>
<script type="application/javascript">
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
                $.ajax({
                    url: "/ProjectCMS/data.json",
                    method: "post",
                    data: {input:txt},
                    dataType: "json",
                    error: function(xhr, ajaxOption, thrownError){
                      alert(xhr.responseText);
                      alert(thrownError);
                    },
                    success: function (data) {
                        var output = '';
                        var count = 0;
                    $.each(data, function (key, val) {
                        if ((val.name.search(txt) != -1) || (val.tags.search(txt) != -1)) {
                            var tags = val.tags.split(" ");
                            output += '<div class=" col-md-3 item-por">'+
                                '<div class="items">' +
                                '<a href="/ProjectCMS/main/product?p=' + val.Product_ID + '">' +
                                '<div class="itemWhite">' +
                                '<img class="itemPicture" src="/ProjectCMS/assets/' + val.images + '">' +
                                '</div>' +
                                '<div class="itemInfoHide caption">' +
                                '<div class="transitionInformation">' +
                                '<h4>' +
                                '<strong>' + val.name + '</strong>' +
                                '</h4>' +
                                '<h4>' + val.price + ' DKK</h4>' +
                                '<h4>' + val.upVote + '</h4>' +
                                '<h5>';
                            for(var i = 0; i < 4; i++){
                                output += "<span class='label label-default'>" + tags[i] + "</span> ";
                            }
                            output +=
                                '</h5>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</a>' +
                                '</div>';
                            count++;
                        }
                    });
                    if (count == 0) {
                        output += '<div class="notFound jumbotron">' +
                            '<div class="container">' +
                            '<h2>No items where found according to your search: <strong>' + search + '</strong></h2>' +
                            '</div>' +
                            '</div>';

                    }
                    swingIn(output);
                },
                    fail: function(data){
                        alert("failed" + data);
                    }
                });

            }
            else
            {
                swingOut();
            }
        });
    });
</script>

</body>
</html>