<?php load::view("admin::partial::panel");?>
<div style="background-color: #444444;" class="col-md-10 pull-right">
<?php
    $output = '';
    if(count($items) > 0){



        $output .= '';
        foreach($items as $product){

            $output .=	'<div class="items thumbnail pull-right">  
<a  href="/myOwn/admin/product?p='.$product['Product_ID'].'">
           <div class="itemWhite">
           
            <img class="itemPicture" src="/myOwn/assets/' . $product['images'] . '">
            </div>
           
    <div class="itemInfoHide caption">
    <div class="transitionInformation">
         <h4>
         <strong>'.$product['name'].'</strong>
			</h4>
              <div class="otherInformation">
                ID: <strong>' . $product['Product_ID'] . '</strong><br>
             Price:<strong>' . $product['price'] . ' DKK</strong><br>
             Size:<strong>' . $product['size'] . '</strong><br>
             Color:<strong>' . $product['color'] . '</strong><br>
             From:<strong>' . $product['manufacture'] . '</strong><br>
             Material:<strong>' . $product['material'] . '</strong><br>
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

