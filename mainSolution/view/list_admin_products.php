<div class="mainProduct">
<?php
$output = '';

if(mysqli_num_rows($productsAdmin) > 0){


    $output .= '';
    while($product = mysqli_fetch_array($productsAdmin)){

        $output .=	'<div class="items thumbnail">  
           <div class="itemWhite">
           
            <img class="itemPicture" src="' . $product['images'] . '">
            </div>
           
    <div class="itemInfoHide caption">
    <div class="transitionInformation">
         <h4>
         <a href="admin.php?product='.$product['name'].'">'.$product['name'].'</a>
			</h4>
             <img src="red.png" class="stick">
              <div class="pricey"><h4>' . $product['price'] . ' DKK</h4></div>
              <div class="otherInformation">
             Id: ' . $product['Product_ID'] . '
             Size:' . $product['size'] . '<br>
             Color:' . $product['color'] . '<br>
             From:' . $product['manufacture'] . '<br>
             Category:' . $product['category'] . '<br>
             Tags:' . $product['tags'] . '<br>
             
         </div>
    </div>
    
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
?>
</div>
