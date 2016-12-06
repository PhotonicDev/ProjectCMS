<div style="background-color: #444444;" class="col-md-9">
    <form method="post" enctype="multipart/form-data">
        <div class="pull-left">

            <h2>Add news post</h2>


                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">


                            <div class="form-group">

                                <label for="comment">Header</label>
                                <input type="text" name="add_news_header" class="form-control" id="usr">
                            <div class="pull-left">
                                <div class="form-group">
                                    <br>
                                    <label for="comment">Text</label>
                                    <textarea class="form-control" id="userComment" rows="4" cols="100" name="add_news_text" placeholder="Add text"></textarea>
                                     <br>
                                    <input class="input-group" type="file" name="uploadimage"/>

                                </div>
                            </div>
                        </div>
                    </div>

                        <button style='margin: 8px;' name='insert_news' type="submit" class="pull-right btn-sm btn btn-default">Post news <span class="glyphicon glyphicon-plus" aria-hidden="true"></button>


                </div>

                </div>
        </div>
    </form>

    <?php
    $output = "";
        foreach($news as $post){

            $output .=	'
          <div class="mainProduct pull-left">
            <form method="post" enctype="multipart/form-data">
   <!-- <a href="index.php?news='.$post['Page_ID'].'"> -->

        <div class="panel panel-default">
            <div class="panel-body">
            <div class="row">
            <div class="col-md-6">
               <input style="display:none;" type="text" name="Page_ID" value="'.$post['Page_ID'].'">
                <img class="postImage img-responsive" src="/ProjectCMS/assets/web_images/'.$post['Image'].'">
                <br>
                <input class="input-group" type="file" name="uploadimage"/>
            </div>
            <div class="col-md-6">
              <h1><input type="text" name="update_news_header" value="'.$post['Header'].'"></h1>
              <textarea class="form-control" id="userComment" rows="10" cols="100" name="update_news_text">'.$post['Description'].'</textarea>
            </div>
            </div>
            </div>
            <div class="panel-footer">
                '.$post['DATE'].'<Br>
                    <button style="margin-left:10px;"  name ="delete_news" title="Click to Delete" onclick="return confirm(\'Are you sure you want to delete it?\')" type="submit" class="pull-right btn-sm btn btn-danger">Delete <span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span></button>
                    <button  type="submit" name="update_news"  class="pull-right btn-sm btn btn-primary">Update <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
                    <br>
                    <br>
                    
            </div>
        </div>
   <!-- </a> --></form>
			</div>';
        }
        echo $output;
    ?>
</div>
