<?php


while ($product = mysqli_fetch_array($newsSelected)){


    ?>
    <div class="container-fluid" xmlns="http://www.w3.org/1999/html">

        <div class="row well">
            <div class="col-md-6">
                <img class="img-responsive thumbnail" src="<?php echo $product['Image']; ?>"><br />
            </div>
            <div class="col-md-6">
                <div class="well">
                    <h3><strong><?php echo $product['Header'];  ?><?php echo $product['DATE'];  ?></strong></h3>
                    <p><?php echo $product['Description'];  ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php
}

?>