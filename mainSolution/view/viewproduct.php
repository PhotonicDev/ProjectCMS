<?php
	echo '
	<div class="item thumbnail container">
		<div class="row">
			<div class="col-md-6">
				<div class="itemImageFrame">
					<img class="itemPictureBig thumbnail" src="' . $product->images . '">
				</div>
			</div>
			<div class="col-md-6">
				<div class="itemInformation pull-right">
	
<div class="panel panel-default">
  <!-- Default panel contents -->
  	<div class="panel-heading"><h3><strong>' . $product->name . '</strong></h3><br/>
  	</div>
  		<div class="panel-body">
  			<h4>Price:<strong> ' . $product->price . ' DKK</strong></h4><br/>
				Description: ' . $product->description . '
		</div>
  <!-- List group -->
  				<ul class="list-group">
    <li class="list-group-item">Manufacturer:<strong> ' . $product->manufacture . '</strong></li>
    <li class="list-group-item">Color:<strong> ' . $product->color . '</strong></li>
    <li class="list-group-item">Size:<strong> ' . $product->size . '</strong></li>
    <li class="list-group-item">Delivery time:<strong> ' . $product->category . '</strong></li>
    <li class="list-group-item">On stock:<strong> ' . $product->stock . '</strong></li>
    
  				</ul>
  				
		</div>
	<button type="button" class="pull-right btn-lg btn btn-success">Add to basket<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></button>
	<button type="button" class="pull-right btn-lg btn btn-success">' . $product->tags . '  <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></button><br/>
    
  </div>
  </div>
	
				</div>
			</div>
		</div>
    </div>';

?>
