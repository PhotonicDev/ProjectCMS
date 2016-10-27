<?php
	$product = mysqli_fetch_array($productSelected);

?>
<div class="item thumbnail container" xmlns="http://www.w3.org/1999/html">
		<div class="row">
			<div class="col-md-6">
				<div class="itemImageFrame">
					<img class="itemPictureBig thumbnail" src="<?php echo $product['images']; ?>">
					<div class="btn-group productControl text-center">
						<button type="button" class="btn-lg btn btn-success">Add to basket <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></button>
						<button type="button" class="btn-lg btn btn-success">Up vote <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></button>
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
    
  				</ul>
  				
		</div>

  </div>
  </div>
	
				</div>
								<!--Product end-->
		<div class="row">
			<div class="col-md-9">
				<div id="commentSection" data-name="" class="container">
					<input id="input" type="text" value="<?php echo $product['name']; ?>" >
					<?php include 'controller/comments.php'; ?>
					<div id="loader-icon"><img src="view/web_images/LoaderIcon.gif" /><div>
				</div>
			</div>
			<div class="col-md-3">
				<div id="echo"></div>
			</div>
		</div>
		<script>


			$(document).ready(function() {
				var txt = $("#input").val();
				var count = 1;
				var win = $(window);
				$('#echo').html(txt);
				win.scroll(function () {
					if (count >= 1) {
						if (win.height() + win.scrollTop() == $(document).height()) {
							{
								$('#loader-icon').show();
								count++;
								$.ajax({
									type: "get",
									url: "controller/comments.php",
									data: {comment: txt},
									cache: false,
									dataType: "text",
									success: function (data) {
										$('.commentSection').append(data);
										$('#loader-icon').hide();

									}
								});
							}
						}
					}
				});
			});

		</script>
		<!--<div class="row">
			<div class="col-md-9">

				</div>
			</div>
			<div class="col-md-3">
				<div class="container">
					<h5>Space For daily products or etc.</h5>
				</div>
			</div>-->

</div>