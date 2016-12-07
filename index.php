<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
$GLOBALS['config'] = array(
    "appName" => "polyDuck",
    "version" => "0.0.1",
    "domain" => "myOwn",
    "cache_enabled" => true,
    "path" => array(
        "app" => "app/",
        "index" => "index.php",
        "cache" => "caches/",
        "session" => "app/sessions",
        "basePath" => "C:/WAMP/wamp64/www/ProjectCMS/"
    ),
    "default" => array(
        "controller" => "main",
        "method" => "index"
    ),
    "routes" => array(),
    "database" => array(
        "host" => "localhost",
        "username" => "root",
        "password" => "lpokji12",
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
                    url: "data.json",
                    method: "post",
                    data: {input:txt},
                    dataType: "json",
                    done: function (data) {
                        var output = '';
                        var count = 0;
                        JSON.parse(data);
                    alert(output);
                    $.each(data, function (key, val) {
                        if ((val.name.search(txt) != -1)) {
                            output += '<div class="items">' +
                                '<a href="index.php?product=' + val.name + '">' +
                                '<div class="itemWhite">' +
                                '<img class="itemPicture" src="/ProjectCMS/assets' + val.images + '">' +
                                '</div>' +
                                '<div class="itemInfoHide caption">' +
                                '<div class="transitionInformation">' +
                                '<h4>' +
                                '<strong>' + val.name + '</strong>' +
                                '</h4>' +
                                '<div class="otherInformation">' +
                                'Price:<strong>' + val.price + ' DKK</strong><br />' +

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