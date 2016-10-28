<?php


echo '<form method="post" enctype="multipart/form-data">
	<div class="item thumbnail container">
		<div class="row">
			<div class="col-md-6">
				<div class="itemImageFrame">
					<img class="itemPictureBig thumbnail" src="">
					<br>
					
					<input class="input-group" type="file" name="uploadimage"/>
					
				</div>
			</div>
			<div class="col-md-6">
				<div class="itemInformation pull-right">
	
<div class="panel panel-default">

  <!-- Default panel contents -->
  <li class="list-group-item">Product_ID<strong><input name="Product_ID" id="product_input" type="text" value=" "></strong></li>	
  	<div class="panel-heading"><h3><strong><input name="product_name" placeholder="Product Name" id="product_input" type="text" value=" "</strong></h3><br/>
  	</div>
  		<div class="panel-body">
  			<h4>Price: in DKK<strong><input name="product_price" id="product_input" type="text" value=" " ></strong></h4><br/>
				
		</div>
  <!-- List group -->
  				<ul class="list-group">
  			
  	<li class="list-group-item">Description:<strong><input name="product_description" id="product_input" type="text" value=" "></strong></li>			
    <li class="list-group-item">Manufacture:<strong><input name="product_manufacture" id="product_input" type="text" value=" "></strong></li>
    <li class="list-group-item">Color:<strong><input name="product_color" id="product_input" type="text" value=" "></strong></li>
    <li class="list-group-item">Size:<strong><input name="product_size" id="product_input" type="text" value=" "></strong></li>
    <li class="list-group-item">Category:<strong><input name="product_category" id="product_input" type="text" value=" "></strong></li>
    <li class="list-group-item">On stock:<strong><input name="product_stock" id="product_input" type="text" value=" "></strong></li>
    <li class="list-group-item">Tags:<strong><input name="product_tags" id="product_input" type="text" value=" "></strong></li>
  				</ul>
  				
		</div>
	<a href="admin.php?page=products"><button type="button" class="pull-left btn-lg btn btn-default">Back <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></button></a>
	
	<button type="submit" name="btn_insert_new"  class="pull-left btn-lg btn btn-primary">Add new <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
	
    <button  name ="btn_delete" title="Click to Delete" onclick="return confirm(\'Are you sure you want to delete it?\')" type="submit" class="pull-left btn-lg btn btn-danger">Delete <span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span></button><br/>
  </div>
  </div>
	
				</div>
			</div>
		</div>
    </div></form>';


