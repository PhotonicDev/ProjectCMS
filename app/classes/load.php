<?php
class load{
    static function view($viewFile,$viewVars = array()){
        extract($viewVars);
        $viewFileCheck = explode(".",$viewFile);
        if(!isset($viewFileCheck[1])){
            $viewFile.= ".php";
        }
        $viewFile = str_replace("::","/", $viewFile);
        $filename = $GLOBALS["config"]["path"]["app"]. "views/{$viewFile}";
            require_once $filename;
    }
}