<?php
define('PWD', dirname(__FILE__) . '/');
require_once PWD . '/../common.php';

ujn::runApplication(array(
	'controllers_path'	=> PWD . '/controller/',
	'models_path'			=> ROOT . '/_models/',
	'libs_path'			=> ROOT . '/_libs/',

	'database_name'		=> IS_LOCAL ? 'swt' : '',	// 本地 or 远程服务器 的数据库名
	
	'dhs' => array(
		'adam' => array(
			'mysql' => IS_LOCAL ? 'root:123456@127.0.0.1:3306' : '',	// 本地 or 远程服务器 的数据库密码及IP端口信息
		)
	)
), ( defined('RUN_FUNC') && function_exists(RUN_FUNC) ) ? RUN_FUNC : '');