<div class="panel panel-default">
<h4 class="text-center"><?php echo $name; ?></h4>
    </div>
<div class="container-fluid">
<?php
$output = "";

while ( $product = mysqli_fetch_array($daily)) {
    $output .= '
    <div class="items center-block">
 <a href="index.php?product='.$product['name'].'">
           <div class="itemWhite">
           
            <img class="itemPicture" src="' . $product['images'] . '">
            </div>
           
    <div class="itemInfoHide caption">
    <div class="transitionInformation text-left">
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
?>
</div>
