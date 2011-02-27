<?php
/**
 * 
 * 用户数据调用接口
 *
 */
class account extends ujn_controller {
	
	/**
	 * 
	 * 解析用户信息数据, 并记录日志
	 */
	function parse() {
	}

	/**
	 * 
	 * 获取用户信息, 昵称 / 头像 / ...
	 */
	function get() {
		$uid = isset($_REQUEST['uid']) ? (int)$_REQUEST['uid'] : 0;
		$d = !empty($uid) ? mdl_account_basic::getInstance()->get($uid) : array();
		output_json($d);
	}
}