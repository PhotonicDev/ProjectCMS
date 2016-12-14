<div class="panel panel-default">

    <h4 class="text-center"><?php echo $name; ?></h4>
</div>

<div class="container-fluid">

    <?php
    $output ='';

    foreach( $daily as $product) {
        $tags = explode(" ",$product['tags'], 3);
        $output .='
        <div class="item-por" style="margin-left:30px;">
<div class="items">
    <a href="/ProjectCMS/main/product?p='. $product['Product_ID'].'">
        <div class="itemWhite">
            <img class="itemPicture" src="/ProjectCMS/assets/'. $product['images'].'">
        </div>
        <div class="itemInfoHide caption">
            <div class="transitionInformation">
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
            <h4>Up votes: <span class="badge">' . $product['upVote'] . '</span></h4>
            </div>
        </div>
    </a>
</div>
</div>
			';

    }
    echo $output;
    ?>
</div>
