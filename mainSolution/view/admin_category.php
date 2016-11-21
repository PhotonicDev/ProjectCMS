<div class="mainProduct">
<div class="jumbotron">
    <div class="container" id="pan">
        <form method="post">
            <button name="update_cate" id="save_cate" type="submit" class="btn btn-primary ">Save</button>
            <br />

<?php
$cat = file_get_contents('category.json');
$temp = json_decode($cat,true);

$output = '';
$h = 0;
while( $h  != count($temp)){
    $output .= '
</br>
    <div class="well">
    Category<br />
    <input type="text" class="category" name="category[]" value="' . $temp[$h]['category'] . '"> <button class="btn btn-primary addSubCategory" type="button"><strong>+</strong> Add sub-category</button>
    <br />
    Sub-category
        <br />

    ';
    $sub_category = explode(' ',$temp[$h]['sub']);
    $sub_count = count($sub_category);

    $i = 0;
while($i != $sub_count){
    $output .= '
       <strong>' . $i . '</strong> <input type="text" class="sub_cate" name="sub[' . $i . '][]" value="' . $sub_category[$i] . '"><br /><br />
    ';

    $i++;
}
    $output .= '<strong>' . $i . '</strong>
        <input name="sub[' . $i . '][]" class="sub_cate" placeholder="add new" type="text" value="" /><br />
        </div>
    ';
    $h++;
}
echo $output;
?>
        </form>
        <?php
        if(isset($_POST['update_cate'])){
            $xml = new DOMDocument();
            $xml_cate = $xml->createElement('Category');
            $xml_sub = $xml->createElement("Sub");
            $xml_cate->appendChild($xml_sub);
            $xml->appendChild($xml_cate);

            $xml->save('/tmp/test.xml');

        /*    $arr = implode(' ',$_POST['sub_category']);
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
        */

        }
        ?>
    </div>
</div>
</div>

<script>
/*    $('#addCategory').on('click', function(){
        var pan = $('#pan');
        var we = document.createElement('div').setAttribute('class','well');
        var inner = document.createElement('input').setAttribute('type','text').setAttribute('name','category');
        var but = document.createElement('button').setAttribute('class','btn btn-primary addSubCategory').setAttribute('type','button');
        pan.append('<br />' + we.append('Category' + inner + '<br />' + but.html('<strong>+</strong> Add sub-category')));

       // pan.append('<br /><div class="well">Category<input type="text" name="category"><br /><button class="btn btn-primary addSubCategory" type="button"><strong>+</strong> Add sub-category</button></div>');
     //   pan.html( pan.html() + );
    });*/
    $('.addSubCategory').on('click', function(){
        var well = $(this).parent('.well');
        well.append('<input name="sub_category[]" placeholder="add new" type="text" value="" /><br />');
    });
  /*  $('#save_cate').on('click', function(){
        var ulti = [];
        $('#pan').children('.well').each(function(why){
            var category = $(this).child('.category').val();
            ulti.push({
                category: category,
                sub: []
            });
            var sub = $(this).children('.sub_cate').each(function(who){
                var subbub = $(this).val();
                ulti[why].sub.push(subbub);
               // temp.push(subbub);
            });



        });
        $.ajax({
            url:'view/admin_new_category.php',
            dataType: 'text',
            method: 'post',
            data:{jSave:ulti},
            success: function(){
                alert('success!');
            }
        })
    })*/
</script>