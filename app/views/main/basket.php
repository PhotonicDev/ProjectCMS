<?php
$cart = session::get("cart");
if(session::check("cart")) {
    if(count($basket) > 0){


       foreach( $basket as $count) {
        echo ' <div class="well">
            <div class="row">
            <div class="col-md-1">
                <button type="button" class="btn btn-danger">X</button><br />

            </div>
            <div class="col-md-2">
            <img class="img-responsive" src="/ProjectCMS/assets/' . $count['images'] . '"  />
                  
            </div>
            <div class="col-md-3">
           <strong>Name:</strong></strog>' . $count['name'] . '<br />
           <strong>Price:</strong>' . $count['price'] . '<br />
           <strong>Description:</strong>' . $count['description'] . '<br />
           <strong>Color:</strong>' . $count['color'] . '<br />
           <strong>Category:</strong>' . $count['material'] . '<br />
           <strong>Size:</strong>' . $count['size'] . '<br />
           <strong>Stock:</strong>' . $count['stock'] . '<br />
           <strong>Manufacture:</strong>' . $count['manufacture'] . '<br />
            </div>
            <div class="col-md-6 text-right">
            <h4>Price for each: '. $count["price"] .' DKK</h4>
            <h4>Amount: <input type="number" name="amount" /></h4>
            </div>
            </div>
            </div>
        ';
    }
    ?>
    <form method="post">
        <div class="well">
            <div class="row">
                <div class="col-md-4 text-left">
                    <button name="clear_all" type="submit" class="btn btn-danger">Clear cart</button>
                    <?php print_r($cart); ?>
                </div>
                <div class="col-md-4 text-right">
                    <button type="button" class="btn btn-success  pull-right">Checkout</button>
                    <div class="pull-right">
                        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="frmPayPal1">
                            <input type="hidden" name="business" value="businessducks@gmail.com">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="item_name" value="' . $count['name'] . '"> <!-- product name -->
                            <!--<input type="hidden" name="description" value="'.$count['description'].'"> NOT WORKING -->
                            <input type="hidden" name="item_number" value="1">  <!-- item number - how much -->
                            <input type="hidden" name="credits" value="510">
                            <input type="hidden" name="userid" value="">
                            <input type="hidden" name="amount" value="' . $count['price'] . '"> <!-- price-->
                            <input type="hidden" name="cpp_header_image" value="http://examserver38.dk/user_images/dcuk-logo.png">
                            <input type="hidden" name="no_shipping" value="0">
                            <input type="hidden" name="currency_code" value="DKK">
                            <input type="hidden" name="handling" value="0"> <!-- shipping cost -->
                            <input type="hidden" name="cancel_return" value="http://examserver38.dk">
                            <input type="hidden" name="return" value="http://examserver38.dk">
                            <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        </form>
                    </div>
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    </form>

    <?php
    }

}
else {
    echo '<div class="container-fluid">
                <div class="well">
                <div class="container">
                <h2><strong>There is no items in your basket!</strong></h2> <h3>You can browse items by using search
                at the top of your page or by browsing categories.</h3>
                </div>
                </div>  
          </div>
';
}
?>


