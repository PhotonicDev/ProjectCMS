<div class="mainProduct">
    <div class="jumbotron">
        <div class="container">
            <div class="well">
                <form method="post">
                <br />
                <h5>Category</h5>
                <input type="text" placeholder="New category" name="category" value="" /> <button class="btn btn-primary" id="addSubCategory" type="button"><strong>+</strong> Add sub-category</button>
                <button type="submit" name="new_cath">Create <strong>+</strong></button>
                <h5>Sub-category</h5>
                <p><input name="sub_category[]" placeholder="New sub-category" type="text" value="" /></p>
                </form>
                <?php
                if(isset($_POST['new_cath'])) {
                    $arr = implode(' ',$_POST['sub_category']);
                    $na = $_POST['category'];
                    $n_arr = array('category' => $na, 'sub' => $arr);
                    $data = file_get_contents('category.json');
                    $de = json_decode($data,true);
                    if(empty($de)){
                        $de = array();
                    }
                    array_push($de,$n_arr);
                    $fp = fopen('category.json','w+');
                    fwrite($fp, json_encode($de));
                    fclose($fp);
                }
            /*    if(isset($_POST['jSave'])) {
                    $ray = $_POST['jSave'];
                    note(print_r($_POST['jSave']));
                    $dat = file_get_contents('category.json');
                    $be = json_decode($dat,true);
                    $o = 0;
                    while($o != count($_POST['jSave'])){
                        $impl = implode(' ', $_POST['jSave'][$o]['sub']);
                        $cate = $_POST['jSave'][$o]['category'];
                        $nn_ar = array('category' => $cate, 'sub' => $impl);

                        array_push($be,$nn_ar);
                        $fr = fopen('category.json','w+');
                        fwrite($fr,json_encode($be));
                        fclose($fr);
                    }
                }*/
                ?>
            </div>
        </div>
    </div>
</div>
<script>
    $('#addSubCategory').on('click', function(){
        var well = $(this).parent('form');
        well.append('<p><input name="sub_category[]" placeholder="add new" type="text" value="" /></p>');
    });
</script>
