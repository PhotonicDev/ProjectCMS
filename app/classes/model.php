<?php
class model{
    public $model;
    public function __construct(){
        //$GLOBALS["instances"][] = &$this;

        $this->model = new database();
        $this->model->connect($GLOBALS["config"]["database"]["host"],
            $GLOBALS["config"]["database"]["username"],
            $GLOBALS["config"]["database"]["password"],
            $GLOBALS["config"]["database"]["name"]);
    }
}