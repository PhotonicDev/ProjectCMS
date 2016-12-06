<div class="col-md-9">
<?php


$product = $products;
    $_SESSION['LOC'][1] = $product['Product_ID'];

echo '   <form id="adminform" method="post" enctype="multipart/form-data">
	<div class="item container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="itemImageFrame">
					<img class="itemPictureBig thumbnail" src="/ProjectCMS/assets/' . $product['images'] . '">
					<br>
					<input class="input-group" type="file" name="uploadimage"/>
				</div>
			</div>
			<div class="col-md-6">
				<div class="itemInformation pull-right">
	
<div class="panel panel-default">

  <!-- Default panel contents -->
  <li class="list-group-item">Product_ID<strong><input name="Product_ID" id="product_input" type="text" value="' . $product['Product_ID'] . '"></strong></li>	
  	<div class="panel-heading"><h3><strong><input name="product_name" placeholder="Product Name" id="product_input" type="text" value="' . $product['name'] . '"</strong></h3><br/>
  	</div>
  		<div class="panel-body">
  			<h4>Price: in DKK<strong><input name="product_price" id="product_input" type="text" value="' . $product['price'] . '" ></strong></h4><br/>
				
		</div>
  <!-- List group -->
  				<ul class="list-group">
  			
  	<li class="list-group-item">Description:<strong><input name="product_description" id="product_input" type="text" value="' . $product['description'] . '"></strong></li>			
    <li class="list-group-item">Manufacture:<strong><input name="product_manufacture" id="product_input" type="text" value="' . $product['manufacture'] . '"></strong></li>
    <li class="list-group-item">Color:<strong><input name="product_color" id="product_input" type="text" value="' . $product['color'] . '"></strong></li>
    <li class="list-group-item">Size:<strong><input name="product_size" id="product_input" type="text" value="' . $product['size'] . '"></strong></li>
    <li class="list-group-item">Material:<strong><input name="product_category" id="product_input" type="text" value="' . $product['material'] . '"></strong></li>
    <li class="list-group-item">On stock:<strong><input name="product_stock" id="product_input" type="text" value="' . $product['stock'] . '"></strong></li>
    <li class="list-group-item">Tags:<strong><input name="product_tags" id="product_input" type="text" value="' . $product['tags'] . '"></strong></li>
  				</ul>
  				
		</div>
	<a href="/ProjectCMS/admin/index"><button type="button" class="pull-left btn-lg btn btn-default">Back <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></button></a>
	
	<button type="submit" name="btn_save_updates"  class="pull-left btn-lg btn btn-primary">Update <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
	
    <button  name ="btn_delete" title="Click to Delete" onclick="return confirm(\'Are you sure you want to delete it?\')" type="submit" class="pull-left btn-lg btn btn-danger">Delete <span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span></button><br/>
  </div>
  </div>
	
				</div>
			</div>
		</div>
    </div></form>';

?>

<!--Product end-->
<div id="color2" class="row">
    <div class="col-md-12">
        <div id="postNew" class="container">


            <div class="row" id="commentsection">
                <div class="col-md-9">
                    <div id="commentSection" class="container">
                        <div id="loader-icon">
                            <img src="view/web_images/LoaderIcon.gif" />
                        </div>
                        <div id="rowcount">

                        </div>
                        <div id="echo">
                            <?php //require 'controller/admin_comments.php'; ?>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>

        </div>
    </div>

</div>
</div>
