<?php
spl_autoload_register(function($className){
	$className = basename($className);
	/*global $cnf;
	if(strpos($className,"\\")){
		$namespace=str_replace("\\","/",__NAMESPACE__);
	} else {
		if(preg_match("/^(TL)([^SGE][A-Za-z]+)$/",$className) || strpos($className,"TLDatabase") !== FALSE){
			$namespace="TrappingLive";
		} else {
			$namespace="TrappingLive";
		}
	}
	$className=str_replace("\\","/",$className);
	$class=$cnf."classes/".(empty($namespace)?"":$namespace."/")."{$className}";
	if(!class_exists($className)){
		if(file_exists("{$class}.php")){
			$file=$class.".php";
		} elseif(file_exists("{$class}.class.php")){
			$file=$class.".class.php";
		} else {
			$file=$class.".php";
		}
		if(file_exists($file)){
			include_once($file);
		} else {
			echo "The class <b>{$file}</b> doesn't exists!";
		}
	}*/
	include_once(dirname(__FILE__)."/{$className}.php");
});
?>