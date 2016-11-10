
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
         <strong>'.$product['name'].'</strong>
			</h4>
              <div class="pricey">
              <h4>' . $product['price'] . ' DKK</h4>
             <img src="red.png" class="stick">
              </div>
              <div class="otherInformation">
                ID: <strong>' . $product['Product_ID'] . '</strong><br>
             Size:<strong>' . $product['size'] . '</strong><br>
             Color:<strong>' . $product['color'] . '</strong><br>
             From:<strong>' . $product['manufacture'] . '</strong><br>
             Category:<strong>' . $product['category'] . '</strong><br>
             Tags:<strong>' . $product['tags'] . '</strong><br>
             Stock:<strong>' . $product['stock'] . '</strong><br>
             
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
