<?php

$product = mysqli_fetch_array($productAdmin);
$_SESSION['LOC'][0] = "index.php/viewproduct.php";
$_SESSION['LOC'][1] = $product['Product_ID'];
echo '   <form id="adminform" method="post" enctype="multipart/form-data">
	<div class="item thumbnail container">
		<div class="row">
			<div class="col-md-6">
				<div class="itemImageFrame">
					<img class="itemPictureBig thumbnail" src="' . $product['images'] . '">
					<br>
					<input class="input-group" type="file" name="uploadimage"/>
				</div>
			</div>
			<div class="col-md-6">
				<div class="itemInformation pull-right">
	
<div class="panel panel-default">

  <!-- Default panel contents -->
  <li class="list-group-item">Product_ID<strong><input name="Product_ID" id="product_input" type="text" value=" ' . $product['Product_ID'] . '"></strong></li>	
  	<div class="panel-heading"><h3><strong><input name="product_name" placeholder="Product Name" id="product_input" type="text" value=" ' . $product['name'] . '"</strong></h3><br/>
  	</div>
  		<div class="panel-body">
  			<h4>Price: in DKK<strong><input name="product_price" id="product_input" type="text" value=" ' . $product['price'] . '" ></strong></h4><br/>
				
		</div>
  <!-- List group -->
  				<ul class="list-group">
  			
  	<li class="list-group-item">Description:<strong><input name="product_description" id="product_input" type="text" value=" ' . $product['description'] . '"></strong></li>			
    <li class="list-group-item">Manufacture:<strong><input name="product_manufacture" id="product_input" type="text" value=" ' . $product['manufacture'] . '"></strong></li>
    <li class="list-group-item">Color:<strong><input name="product_color" id="product_input" type="text" value=" ' . $product['color'] . '"></strong></li>
    <li class="list-group-item">Size:<strong><input name="product_size" id="product_input" type="text" value=" ' . $product['size'] . '"></strong></li>
    <li class="list-group-item">Category:<strong><input name="product_category" id="product_input" type="text" value=" ' . $product['category'] . ' "></strong></li>
    <li class="list-group-item">On stock:<strong><input name="product_stock" id="product_input" type="text" value=" ' . $product['stock'] . ' "></strong></li>
    <li class="list-group-item">Tags:<strong><input name="product_tags" id="product_input" type="text" value=" ' . $product['tags'] . ' "></strong></li>
  				</ul>
  				
		</div>
	<a href="admin.php?page=products"><button type="button" class="pull-left btn-lg btn btn-default">Back <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></button></a>
	
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
            <form method="post">
                <div class="form-group">
                    <label style="color:#fff;" for="userNameInput">User:</label>
                    <?php
                    if(isset($_SESSION['username'])) {
                        echo '<input type="text" id="userNameInput" class="form-control" name="postName" required value="' . $_SESSION['username'] . '">';
                    }
                    else {
                        echo '<input type="text" id="userNameInput" class="form-control" placeholder="Your name..." name="postName" required value="">';
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label style="color:#fff;" for="userComment">Comment:</label>
                    <textarea class="form-control" id="userComment" rows="4" name="comment" placeholder="What do you think about product?"></textarea>
                </div>
                <input type="submit" class="btn btn-primary" name="submit_comment">
            </form>

            <div class="row" id="commentsection">
                <div class="col-md-9">
                    <div id="commentSection" class="container">
                        <div id="loader-icon">
                            <img src="view/web_images/LoaderIcon.gif" />
                        </div>
                        <div id="rowcount">

                        </div>
                        <div id="echo">
                            <?php require 'controller/admin_comments.php'; ?>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>

        </div>
    </div>

</div>

<script>
    /*	$(document).ready(function() {
     function getComments(url) {
     $.ajax({
     url: url,
     type: "GET",
     data: {rowCount: $('.rowcount').val()},
     beforeSend: function () {
     $('#loader-icon').show();
     },
     complete: function () {
     $('#loader-icon').hide();
     },
     success: function (data) {
     $("#echo").append(data);
     },
     error: function () {
     }

     });
     }

     var number = $('.pagenum:last').val();

     //	var count;
     $(window).scroll(function () {
     if ($(window).scrollTop() == $(document).height() - $(window).height()) {

     if (number <= $(".rowcount").val()) {
     var pagenum = parseInt(number)+5;
     getComments('controller/comments.php?current='+pagenum);
     }
     }
     });
     });
     /*	$(document).ready(function(){
     function getresult(url) {
     $.ajax({
     url: url,
     type: "GET",
     data:  {rowcount:$("#rowcount").val()},
     beforeSend: function(){
     $('#loader-icon').show();
     },
     complete: function(){
     $('#loader-icon').hide();
     },
     success: function(data){
     $("#faq-result").append(data);
     },
     error: function(){}
     });
     }
     $(window).scroll(function(){
     if ($(window).scrollTop() == $(document).height() - $(window).height()){
     if($(".pagenum:last").val() <= $(".total-page").val()) {
     var pagenum = parseInt($(".pagenum:last").val()) + 1;
     getresult('getresult.php?page='+pagenum);
     }
     }
     });
     });*/
</script>





