<div class="panel panel-default">

    <h4 class="text-center"><?php echo $name; ?></h4>
</div>

<div class="container-fluid">
    <?php
    $output ='';

    foreach( $daily as $product) {
        $output .='
<div class="items center-block">
    <a href="index.php?product='. $product['name'].'">
        <div class="itemWhite">
            <img class="itemPicture" src="/myOwn/assets/'. $product['images'].'">
        </div>
        <div class="itemInfoHide caption">
            <div class="transitionInformation text-left">
            <h4>
                <strong>
                    '. $product['name'].'
                </strong>
		    </h4>
		    <h4>
		        <strong>
		            '. $product['price'].' DKK
		        </strong>
		    </h4>
            <h4>
                ' . $product['upVote'] . '
            </h4>
            <button class="btn btn-success btn-group-justified"  type="button">Add to Cart</button>
            </div>
        </div>
    </a>
</div>
			';

    }
    echo $output;
    ?>
</div>
