<div class="container">
   

    <?php
    $output = '';

    if(mysqli_num_rows($news) > 0){



        while($post = mysqli_fetch_array($news)){

            $output .=	'
    <a href="index.php?news='.$post['Page_ID'].'">

        <div class="panel panel-default">
            <div class="panel-body">
            <div class="row">
            <div class="col-md-6">
                <img class="postImage img-responsive" src="view/web_images/'.$post['Image'].'">
            </div>
            <div class="col-md-6">
              <h1>'.$post['Header'].'</h1>
                '.$post['Description'].'
            </div>
            </div>
            </div>
            <div class="panel-footer">
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
</div>