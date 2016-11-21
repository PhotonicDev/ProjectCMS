<div class="row">
    <div class="col-md-9">
        <div class="welcome-tile">
            <h1 class="text-right">
                <strong>...Winter is coming</strong>
            </h1>

            <h4 class="text-right">But no until polyDuck autumn sales rampage!<br/>
                Here at polyDuck time of the year doesn't really matter since<br />
                we always treat our customers, and not only on holidays.<br /></h4>
                <p class="text-right"><span class="label label-primary">New ducks every day, stupidly low prices, rare stock</span></p>
            <p class="text-right"><button type="button" class="btn btn-default btn-lg" >Take a peek...</button></p>

        </div>
    </div>
    <div class="col-md-3">
    </div>
</div>
<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">

                        <?php


                        $output = '';
                        while($slide = mysqli_fetch_array($news)){
                            if(empty($output)) {

                                $output .=  "<!-- Wrapper for slides -->
        <div class='item active'>
            <img class='bound-img' src='view/web_images/" .  $slide['Image'] . "' alt='...'>
            <div class='carousel-caption'>
                <h3>" .  $slide['Header'] . "</h3>
                <p>" . $slide['Description'].  "</p>
            </div>
        </div>";

                            }
                            else {
                                $output .=  "<!-- Wrapper for slides -->
        <div class='item'>
            <img class='bound-img' src='view/web_images/" .  $slide['Image'] . "' alt='...'>
            <div class='carousel-caption'>
                <h3>" .  $slide['Header'] . "</h3>
                <p>" . $slide['Description'].  "</p>
            </div>
        </div>";


                            }
                        }
                        echo $output;
                        ?>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>

        </div>
                <?php
                $output = '';

                if(mysqli_num_rows($products) > 0){


                    $output .= '';
                    while($product = mysqli_fetch_array($products)) {
                        if (!isset($num) || $num == 4) {
                            $num = 0;
                        }

                        if ($num == 0) {
                                $output .= '<div class="row">';
                            }

                                $output .= '
<div class="col-md-3 item-por">
<div class="items">
 <a href="index.php?product=' . $product['name'] . '">
           <div class="itemWhite">
           
            <img class="itemPicture" src="' . $product['images'] . '">
            </div>
           
    <div class="itemInfoHide caption">
    <div class="transitionInformation">
         <h4>
         <strong>' . $product['name'] . '</strong>
			</h4>
              <div class="pricey">
              <h4>' . $product['price'] . ' DKK</h4>
             <img src="red.png" class="stick">
              </div>
              <div class="otherInformation">
             Size:<strong>' . $product['size'] . '</strong><br>
             Color:<strong>' . $product['color'] . '</strong><br>
             From:<strong>' . $product['manufacture'] . '</strong><br>
             Category:<strong>' . $product['category'] . '</strong><br>
             Tags:<strong>' . $product['tags'] . '</strong><br>
             
              </div>
    </div>
              
    
    </div>
    </a>
</div>
</div>			';
                        if($num == 3){
                            $output .= '</div>';
                        }
                        $num++;

                    }


                    echo $output;
                }
                else
                {
                    echo ' ';
                }

                ?>

    </div>
    <div class="col-md-3">
    <?php include_once 'controller/Controller.php';
    $controller = new Controller();
    $controller->recommend();
    ?>
    </div>
</div>