<?php

function note($message){
    echo '
<div class="container">
    <div class="errorResponse alert alert-dismissible alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!  ' . $message . '</strong>
    </div>
</div>';
}

function error($message){
    echo '
<div class="container">
    <div class="errorResponse alert alert-dismissible alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>'. $message .'</strong>
    </div>
</div>';
}