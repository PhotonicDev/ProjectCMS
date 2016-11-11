<?php
	$product = mysqli_fetch_array($productSelected);
if($_SESSION['LOC'] != $product['Product_ID']) {
	$_SESSION['LOC'][0] = $product['name'];
	$_SESSION['LOC'][1] = $product['Product_ID'];
}
?>
<div class="item thumbnail container" xmlns="http://www.w3.org/1999/html">
		<div class="row">
			<div class="col-md-6">
				<div class="itemImageFrame">
					<img class="itemPictureBig thumbnail" src="<?php echo $product['images']; ?>"><br />
					<div class="btn-group productControl text-center">
						<form method="get">
						<button id="cart" name="add_to_cart" type="button" class="btn-lg btn btn-success">Add to basket <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></button>
						<button id="up" type="button" class="btn-lg btn btn-success">Up vote <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="itemInformation pull-right">
	
<div class="panel panel-default">
  <!-- Default panel contents -->
  	<div class="panel-heading"><h3><strong><?php echo $product['name']; ?></strong></h3><br/>
  	</div>
  		<div class="panel-body">
  			<h4>Price:<strong><?php echo $product['price']; ?> DKK</strong></h4><br/>
					<p><?php echo $product['description']; ?></p>
		</div>
  <!-- List group -->
  				<ul class="list-group">
    <li class="list-group-item">Manufacturer:<strong><?php echo $product['manufacture']; ?></strong></li>
    <li class="list-group-item">Color:<strong> <?php echo $product['color']; ?></strong></li>
    <li class="list-group-item">Size:<strong> <?php echo $product['size']; ?></strong></li>
    <li class="list-group-item">Category:<strong> <?php echo $product['category']; ?></strong></li>
    <li class="list-group-item">On stock:<strong> <?php echo $product['stock']; ?></strong></li>
    <li class="list-group-item">Tags:<strong class="tags"> <?php echo $product['tags']; ?></strong></li>
	<li class="list-group-item">Views:<strong> <?php echo $product['views']; ?></strong></li>
	<li class="list-group-item">Up votes:<strong> <?php echo $product['upVote']; ?></strong></li>


				</ul>
  				
		</div>

  </div>
  </div>
	
				</div>
								<!--Product end-->
	<div class="row">
		<div class="col-md-12">
			<div id="postNew" class="container">
				<form method="post">
					<div class="form-group">
						<label for="userNameInput">User:</label>
						<?php

						if(isset($_SESSION['user_id'])) {
							echo '<input type="text" id="userNameInput" class="form-control" name="postName" required value="' . $_SESSION['username'] . '">';
						}
						else {
							echo '<input type="text" id="userNameInput" class="form-control" placeholder="Your name..." name="postName" required value="">';
						}
						?>
					</div>
					<div class="form-group">
						<label for="userComment">Comment:</label>
						<textarea class="form-control" id="userComment" rows="4" name="comment" placeholder="What do you think about product?"></textarea>
					</div>
					<input type="submit" class="btn btn-primary" name="submit_comment">
				</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-9">
			<div id="commentSection" class="container">
				<div id="loader-icon">
					<img src="view/web_images/LoaderIcon.gif" />
				</div>
				<div id="rowcount">

				</div>
				<div id="echo">
					<?php include_once 'controller/comments.php'; ?>
				</div>

			</div>
		</div>
		<div class="col-md-3">
			Ad!
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


</div>