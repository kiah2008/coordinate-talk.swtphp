<?php

define('ROOT',				dirname(__FILE__) . '/');
define('CUSTOM_CFG_PATH',		ROOT . '/_custom_cfg/');
define('IS_LOCAL',			$_SERVER['SERVER_ADDR'] == '127.0.0.1');
define('IS_DEBUG',			true);

include_once ROOT . '/../ujn2/ujn.php';

ujn_runtime::setSplitAlias('adam');
function page_404($class_name, $class_path) { echo '404 page'; var_dump($class_name, $class_path); }

// 标准化的json输出方式
function output_json($data) {
	$output = !empty($data) ? $data : array();
	
	header('content-type: application/json; charset=utf-8');
	$out_json = json_encode($output);
	echo isset($_REQUEST['jsonpcb']) ? "{$_REQUEST['jsonpcb']}({$out_json})" : $out_json;
}