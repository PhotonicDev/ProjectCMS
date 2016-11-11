<?php
$connect = mysqli_connect("localhost", "root", "123" /* "lpokji12" */, "db_cms");
$output = '';
$i = 0;
while (count($_SESSION['cart']) > $i ){

        $output .= $_SESSION['cart'][$i];
        $i++;
    if(count($_SESSION['cart']) != $i) {
        $output .= ',';
    }
    else $output .='';
    }
$sql = "SELECT * FROM products WHERE Product_ID IN ($output)";
$result = mysqli_query($connect, $sql);
?>
<div class="container">
    <div class="well text-right">
        <div class="row">
            <div class="col-md-12">
        <button type="button" class="btn btn-danger">Clear selected</button>
        <button type="button" class="btn btn-danger">Clear cart</button>
        <button type="button" class="btn btn-success">Buy selected</button>
        <button type="button" class="btn btn-success">Buy All</button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <?php
 while( $count = mysqli_fetch_array($result)) {
     echo ' <div class="well">
            <div class="row">
            <div class="col-md-3">
            <img class="img-responsive" src="' . $count['images'] . '"  />
                  
            </div>
            <div class="col-md-5">
            <h5><strong>Name:</strong></strog>' . $count['name'] . '</h5>
           <strong>Price:</strong>' . $count['price'] . '<br />
           <strong>Description:</strong>' . $count['description'] . '<br />
           <strong>Color:</strong>' . $count['color'] . '<br />
           <strong>Category:</strong>' . $count['category'] . '<br />
           <strong>Size:</strong>' . $count['size'] . '<br />
           <strong>Stock:</strong>' . $count['stock'] . '<br />
           <strong>Manufacture:</strong>' . $count['manufacture'] . '<br />
            </div>
            <div class="col-md-4 text-right">
            <button type="button" class="btn btn-danger">Cancel</button><br />
            </div>
            </div>
            </div>
        ';
 }
 ?>
</div>


