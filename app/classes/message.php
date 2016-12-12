<?php
    class message{
        static function note($type){
            echo "
                <div class='container'>
                    <div class='errorResponse alert alert-dismissible alert-success' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                        <strong>Success! {$type}</strong>
                    </div>
                </div>
";
        }
        static function error($msg){
            echo '
                <div class="container">
                    <div class="errorResponse alert alert-dismissible alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Oh Snap! '. $msg .'</strong>
                    </div>
                </div>';

        }
    }