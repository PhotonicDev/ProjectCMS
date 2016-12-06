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
                <img src='/ProjectCMS/assets/".$desc['pictures']."' class='img-rounded' alt='Cinque Terre' width='200' height='130'>
                <button type='submit' name='btn_update'  class='pull-right btn-sm btn btn-primary'>Update <span class='glyphicon glyphicon-refresh' aria-hidden='true'></span></button>
            </div>
        </form>
";

    }
    echo $show;
?>
</div>







