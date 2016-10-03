<link rel="stylesheet" href="view/sass/main.css">
<?php
$connect = mysqli_connect("localhost", "root", "lpokji12", "db_cms");
$output = '';
$sql = "SELECT * FROM products WHERE name LIKE '%".$_POST["search"]."%'";
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0)
{

    $output .= '';
    while($row = mysqli_fetch_array($result))
    {
/*
<div class="table-responsive">
                          <table class="table table bordered">
                               <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>description</th>
                                    <th>color</th>
                                    <th>category</th>
                                    <th>stock</th>
                                    <th>tags</th>


                               </tr>
        <tr>
                     <td>'.$row["name"].'</td>
                     <td>'.$row["price"].'</td>
                     <td>'.$row["description"].'</td>
                     <td>'.$row["color"].'</td>
                     <td>'.$row["category"].'</td>
                     <td>'.$row["stock"].'</td>
                     <td>'.$row["tags"].'</td>
                     <td>'.$row["manufacture"].'</td>

                </tr>
*/
        $output .= ' <div style="margin-top: 20px;">
                <div class="col-md-2 column productbox">
    <img src="'.$row["images"].'" class="img-responsive">
    <div class="duck_name"> <br>'.$row["name"].' </div>
    <br>
    <div class="txt_stock">In Stock '.$row["stock"].' </div>
    <div class="search_price">'.$row["price"].' DKK</div><div class="pull-right"><a href="#" class="btn btn-danger btn-sm" role="button">BUY</a> 
    
    </div></div>
    
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

?>

