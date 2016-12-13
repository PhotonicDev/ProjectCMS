<div class="panel panel-default pull-right">

    <h4 class="text-center"></h4>
</div>

<div class="container-fluid">

    <?php
    $output ='';

    if(count($daily) < 5){
         $count = 5 - count($daily);
    }

    foreach( $daily as $product) {
        $tags = explode(" ",$product['tags'], 3);
        $output .='
        <div class="item-por">
<div class="items center-block">
    <a href="/ProjectCMS/main/product?p='. $product['Product_ID'].'">
        <div class="itemWhite">
            <img class="itemPicture" src="/ProjectCMS/assets/'. $product['images'].'">
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
            ';
            foreach( $tags as $tag){
                $output .= "<span class='label label-default'>" . $tag . "</span> ";
            }
        $output .= '
            </div>
        </div>
    </a>
</div>
</div>
			';

    }
    for($i = 0; $i < $count; $i++){

        $output .= '<form method="post"
                   <button type="submit" name="add_daily">Add daily product</button></form>';
    }
    echo $output;
    ?>
</div>
