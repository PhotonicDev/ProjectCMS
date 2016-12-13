<?php

if(!empty($_POST['search']))
{

    $output .= '';
    while($product = mysqli_fetch_array($result)){

        $output .=	'<div class="items">  
         <a href="index.php?product='.$product['name'].'">
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
             Size:<strong>' . $product['size'] . '</strong><br>
             Color:<strong>' . $product['color'] . '</strong><br>
             From:<strong>' . $product['manufacture'] . '</strong><br>
             Category:<strong>' . $product['material'] . '</strong><br>
             Tags:<strong>' . $product['tags'] . '</strong><br>
             
              </div>
    </div>
              
    
    </div>
    </a>
</div>
			';
    }
    echo $output;
}
else
{
    echo '<div class="notFound jumbotron">
<div class="container">
    <h2>No items where found according to your search: ' . $q .'</h2>
</div>
</div>';
}

?>
