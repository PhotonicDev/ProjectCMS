<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <?php
            $data["name"] = $name;
            $data["daily"] = $daily;
            load::view("partial::daily",$data);
            ?>
        </div>
        <div class="col-md-9">

            <?php
            $output = '';
                foreach($news as $post){

                    $output .=	'
    <a href="index.php?news='.$post['Page_ID'].'">

        <div class="panel panel-default">
            <div class="panel-body">
            <div class="row">
            <div class="col-md-6">
                <img class="postImage img-responsive" src="/ProjectCMS/assets/'.$post['Image'].'">
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
            ?>
        </div>
    </div>
</div>