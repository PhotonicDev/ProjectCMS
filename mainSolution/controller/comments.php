<?php

require_once("model/Model.php");

$model = new Model();
$perPage = 10;

if(!empty($_GET["comment"])) {
    $page = $_GET["comment"];
    note($page);

}


$page = 1;
//$productID = mysqli_fetch_array($productSelected);
//		$product = $productID['Product_ID'];
//		$social = $this->model->getComments($product);
//if(!empty($_GET["comment"]) && !empty($_GET["product"])) {
//    $comment = $_GET["comment"];
//}

    $start = ($page-1)*$perPage;
    if($start < 0) {
        $start = 0;
    }
$sqlQuery = $model->Connect()->getQuery("SELECT * FROM social_pages WHERE `Product_ID` = " . $product . " LIMIT " . $start . "," . $perPage);

$query = $sql . " LIMIT " . $start . "," . $perPage;
$faq = $model->Connect()->getQuery("SELECT * FROM social_pages WHERE `Product_ID` = " . $product);

while($row=mysqli_fetch_assoc($sqlQuery)) {
    $resultSet[] = $row;
}
if(!empty($resultSet)) {
    return $resultSet;
}
else {
    error("Cant retrieve comments");
}


$output = '';

if(!empty($faq)) {

    foreach($faq as $posts) {
        $output .=  '
<div class="panel panel-default">
  	<div class="panel-heading">
  	    <h5>' . $posts['name'] . '</h5> 
  	    <p>' . $posts['Views'] . '</p>
  	</div>
  	<div class="panel-body">
  	    <p>' . $posts['Comments'] . '</p>
  	    <span class="badge">
  	        ' . $posts['Likes'] . '
  	    </span>
  		<button type="button" class="btn-lg btn btn-success">Up <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></button>

  		</div>
	</div>
';
    }
}
else {
    error("No Data given");
}
echo $output;
?>
