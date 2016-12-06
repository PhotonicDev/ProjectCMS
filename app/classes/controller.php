<?php
class controller{
    public $model;

    public function __construct(){

        $GLOBALS["instances"][] = &$this;
    }
}