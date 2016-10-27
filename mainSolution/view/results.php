<?php
require "../controller/fetch.php";
if(mysqli_num_rows($result) > 0)
{

$output .= '';
while($product = mysqli_fetch_array($result)){

    $output .=	'<div class="items thumbnail">  
           <div class="itemWhite">
           
            <img class="itemPicture" src="' . $product['images'] . '">
            </div>
           
    <div class="itemInfoHide caption">
    <div class="transitionInformation">
         <h4>
         <a href="index.php?product='.$product['name'].'">'.$product['name'].'</a>
			</h4>
              <div class="pricey">
              <h4>' . $product['price'] . ' DKK</h4>
             <img src="red.png" class="stick">
              </div>
              <div class="otherInformation">
             Size:' . $product['size'] . '<br>
             Color:' . $product['color'] . '<br>
             From:' . $product['manufacture'] . '<br>
             Category:' . $product['category'] . '<br>
             Tags:' . $product['tags'] . '<br>
             
              </div>
    </div>
              <div class="btn-group-vertical productControl text-center">
              <button type="button" class="btn btn-sm btn-success ">Add to basket</button>
              <button type="button" class="btn btn-sm btn-primary ">Upvote</button>
              </div>
    
    </div>
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
