<?php
function Connect(){

    $db = require('model/conn.php');
    $connection = new Database($db);
    return $connection;
}

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
    $sql = Connect()->getQuery("SELECT * FROM social_pages WHERE Product_ID='" . $q . "'");//   from where to start,how many posts


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


    if(mysqli_num_rows($sql) > 0)
    {

        $output .= '';
        while($comment = mysqli_fetch_array($sql)){

            $output .=	'<form method="post">
        <label style="color:#fff;">All existing comments :</label>
        <div class="well">
          <label>ID: '. $comment['comment_id'].'</label>
           <input style="display:none" name="comment_id" value="'. $comment['comment_id'].'">
           <h3>'. $comment['name'] .'</h3>
           <h5>'. $comment['Comments'] .'</h5>
        </div>
        <button  name ="delete_comment" title="Click to Delete" onclick="return confirm(\'Are you sure you want to delete it?\')" type="submit" class="pull-left btn-sm btn btn-danger">Delete <span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span></button><br/>
			<br><br></form>';
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
