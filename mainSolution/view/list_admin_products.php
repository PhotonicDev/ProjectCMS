
<div style="background-color: #444444" class="mainProduct">




<?php
$output = '';

if(mysqli_num_rows($productsAdmin) > 0){



    $output .= '';
    while($product = mysqli_fetch_array($productsAdmin)){

        $output .=	'<div class="items thumbnail">  
<a  href="admin.php?product='.$product['name'].'">
           <div class="itemWhite">
           
            <img class="itemPicture" src="' . $product['images'] . '">
            </div>
           
    <div class="itemInfoHide caption">
    <div class="transitionInformation">
         <h4>
         '.$product['name'].'
			</h4>
             <img src="red.png" class="stick">
              <div class="pricey"><h4>' . $product['price'] . ' DKK</h4></div>
              <div class="otherInformation">
             Id: ' . $product['Product_ID'] . '<br>
             Size:' . $product['size'] . '<br>
             Color:' . $product['color'] . '<br>
             From:' . $product['manufacture'] . '<br>
             Category:' . $product['category'] . '<br>
             Tags:' . $product['tags'] . '<br>
             Stock:' . $product['stock'] . '<br>
             
         </div>
    </div>
    </a>
    </div>
</div>
			';
    }
    echo $output;
}
else
{
    echo ' ';
}

echo "";
?>
</div>
