<div class="mainproduct">
<?php

foreach ($admin_products as $name => $product)
{
    echo '<div class="items thumbnail">  
           <div class="itemWhite">
           
            <img class="itemPicture" src="' . $product->images . '">
            </div>
           
    <div class="itemInfoHide caption">
    <div class="transitionInformation">
         <h4>
         <a href="admin.php?product='.$product->name.'">'.$product->name.'</a>
			</h4>
             <img src="red.png" class="stick">
              <div class="pricey"><h4>' . $product->price . ' DKK</h4></div>
              <div class="otherInformation">
              Products: ' . $product->Product_ID . '  <br>
             Size:' . $product->size . '<br>
             Color:' . $product->color . '<br>
             From:' . $product->manufacture . '<br>
             Category:' . $product->category . '<br>
             Tags:' . $product->tags . '<br><Br>
             <a href="admin.php?product='.$product->name.'"> <button type=\'submit\' class=\'btn btn-primary\'>Edit</button></a>
             <button title="Click to Delete" onclick="return confirm(\'Are you sure you want to delete it?\')" type=\'submit\' class=\'btn btn-danger\'>Delete</button></a>
         </div>
    </div>
    
    </div>
</div>
			';
} ?>

</div>