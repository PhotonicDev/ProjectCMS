<?php
$product = mysqli_fetch_array($newsSelected);
?>
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="panel-default panel">
        <div class="col-md-6">
                <img class="img-responsive thumbnail" src="<?php echo $product['Image']; ?>"><br />
            </div>
        </div>
        <div class="col-md-6">
            <div class="well">
                <h4><?php echo $product['Header'];  ?><?php echo $product['DATE'];  ?> </h4>
                <p><?php echo $product['Description'];  ?></p>
            </div>
                </div>

        </div>
