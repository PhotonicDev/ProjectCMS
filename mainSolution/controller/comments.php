<?php
$conn = mysqli_connect("localhost", "root", "123", "db_cms");

if (isset($_SESSION['LOC'][1])) {   //getting product comments by id
    $q = $_SESSION['LOC'][1];

    /* if(!empty($_GET['current'])) {
     $commentRow = $_GET["current"];
     }
     else {
         $commentRow = 1;
     }
     $perPage = 5;
 */
    $sql = "SELECT * FROM social_pages WHERE Product_ID='" . $q . "' LIMIT 25,15 ";//   from where to start,how many posts


    /*   $start = ($commentRow * $perPage) - $perPage;

    $faq = '';

       $updateSql = $sql . " LIMIT " . $perPage . " OFFSET " . $start;
       echo $updateSql;
           $someString = mysqli_query($conn, $updateSql);
           while($row = mysqli_fetch_assoc($someString)) {
               $set[] = $row;
           }
           if(!empty($set)) {
               $faq = $set;

           }



       if(empty($_GET['rowCount'])) {
           $sqlQuery = mysqli_query($conn, $sql);
           $_GET["rowCount"] = mysqli_num_rows($sqlQuery);
       }
       $output = '';

       if(!empty($faq)) {
           $output .= '<input type="text" class="pagenum" value="' . $start . '" />
           <input type="text" class="rowcount" value="' . $_GET["rowCount"] . '" />';
           foreach($faq as $k=>$v) {
               $output .=  '<div class="well">' . $faq[$k]["name"] . ' <br />' . $faq[$k]["Comments"] . '</div>';
           }
       }
       print $output;

           $output .= '<input type="text" class="pagenum" value="' . $commentRow . '" /><input type="text" class="total-page" value="' . $pages . '" />';



   */
    $output = '';
    $result = mysqli_query($conn, $sql);


    if(mysqli_num_rows($result) > 0)
    {

        $output .= '';
        while($comment = mysqli_fetch_array($result)){

            $output .=	'
        <div class="well">  
           <h3>'. $comment['name'] .'</h3>
           <h5>'. $comment['Comments'] .'</h5>
        </div>
			';
        }
        echo $output;
    }
    else
    {
        echo '<div class="notFound jumbotron">
                <div class="container">
                    <h2>be the first one to comment</h2>
                </div>
            </div>';
    }
}
