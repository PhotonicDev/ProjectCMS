<div class="col-md-9">

<?php
$show = '';
    foreach($description as $desc) {

        $show .= "
        <form method='post' enctype='multipart/form-data'>
            <div class='descbox'>

                <div class='form-group'>
                    <label for='comment'>Title:  
                    </label>
                    <input type='text' name='desc_title' value='" . $desc['title'] . "' class='form-control' id='usr'>
                    <label for='comment'>Company description:</label>
                    <textarea name='desc_text'  class='form-control' id='comment'>" . $desc['Description'] . "</textarea>
                    
                </div>
                <input class='input-group' type='file' name='uploadimage'/><br>
                <div class='panel panel-default'>
					  <li class='list-group-item'>Image alt tag<strong><input name='desc_update_alt_tag' id='product_input' type='text' value='" . $desc['alt'] . "'></strong></li>	
					</div>
                <input type='hidden' value='".$desc['pictures']."' name='spareImage'/>
                
                <img src='/ProjectCMS/assets/".$desc['pictures']."' class='img-rounded' alt='".$desc['alt']."' width='200' height='130'>
              
                <button type='submit' name='btn_update'  class='pull-right btn-sm btn btn-primary'>Update <span class='glyphicon glyphicon-refresh' aria-hidden='true'></span></button>
            </div>
        </form>
";

    }
    echo $show;
?>
</div>







