<?php
$output = '';

if(mysqli_num_rows($news) > 0){


    $output .= '';
    while($post = mysqli_fetch_array($news)){

        $output .=	'
    <a href="index.php?news='.$post['Page_ID'].'">

        <div class="panel panel-default">
            <div class="panel-body">
                <img class="postImage img-responsive" src="view/web_images/'.$post['Image'].'">
                '.$post['Description'].'
            </div>
            <div class="panel-footer">
                '.$post['Header'].'
                '.$post['DATE'].'
            </div>
        </div>
    </a>
			';
    }
    echo $output;
}
else
{
    echo ' ';
}
?>
