<?php
$cart = session::get("cart");
if(!empty($basket)) {
    if(count($basket) > 0){


       foreach( $basket as $count) {
        echo ' <form method="post"><div class="well">
            <div class="row">
            <div class="col-md-1">
                <button type="submit" name="deleteItem" class="btn btn-danger">X</button><br />
                <input type="hidden" name="Product_ID" value="' . $count["Product_ID"] . '" />
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
            <div class="calc">
            Amount: <input min="0" class="amount" data-unit="' . $count["price"] . '" value="1" type="number" name="amount" /><br />
            Sum: <span class="label label-default">' . $count["price"] . '</span><br/>
            </div>
            </div>
            </div>
            </div>
            </form>
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


            </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-success  pull-right">Checkout</button>
                    <h4 class="pull-right" style="margin-right:20px;"> <span id="sum" class="label label-default">0</span> DKK  </h4>
                </div>
            </div>
        </div>
    </form>
<script>
    $(".amount").on("change",function(){
        var bt = 0;
        var calc = 1;
         $(".calc").each(function(){
             var q = $(this).children(".amount");
             var amount = $(q).val();
             $(".pay_item").each(function(){
                 var iter = $(this).data("iteration");
                if(iter == calc ){
                    $(this).val(amount);
                }
             });
            var up = $(q).data("unit");
            var st = (amount * up);
            bt += st;
              $(this).children(".label").html(st.toFixed(2));
              calc++;
        });

        $("#sum").html(bt.toFixed(2));
        $(".pay_price").val(bt.toFixed(2));
    });
</script>
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


