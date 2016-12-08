<?php
spl_autoload_register(function($class){
    $cacheFile = $GLOBALS["config"]["path"]["cache"]."classloc.cache";
    if($GLOBALS["config"]["cache_enabled"] && file_exists($cacheFile)){
        $locations = unserialize(file_get_contents($cacheFile));
    }
    else {
        $locations = array();
    }
    if(isset($locations[$class])){
        $instantiable = $locations[$class]["instantiable"];
        $classFile = $locations[$class]["classFile"];
    }
    else{
        $appPath = $GLOBALS["config"]["path"]["app"];
        if(file_exists("{$appPath}classes/{$class}.php")){
            $instantiable = true;
            $classFile = "{$appPath}classes/{$class}.php";
        }
        elseif(file_exists("{$appPath}controllers/{$class}.php")){
            $instantiable = true;
            $classFile = "{$appPath}controllers/{$class}.php";
        }
        elseif(file_exists("{$appPath}models/{$class}.php")){
            $instantiable = true;
            $classFile = "{$appPath}models/{$class}.php";
        }
        else{
            $instantiable = false;
            $classFile = "{$appPath}{$class}.php";
        }
        if($GLOBALS["config"]["cache_enabled"]){
            $locations[$class] = array(
                "instantiable" => $instantiable,
                "classFile" => $classFile
            );
            file_put_contents($cacheFile,serialize($locations));

        }
    }
    if(file_exists($classFile)){
        require_once $classFile;

    }
    else{
        message::error("Page not found 404");
    }
    if($instantiable){
        foreach($GLOBALS["instances"] as $instance){
            $instance->$class = new $class();
        }
    }
});