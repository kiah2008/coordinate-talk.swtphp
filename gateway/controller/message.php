<?php
/**
 * 
 * 消息处理接口
 *
 */
class message extends ujn_controller {
	// 取消自动模板输出
	var $auto_render = false;

	/**
	 * 
	 * 添加消息
	 */
	function add() {
		$latitude = isset($_REQUEST['latitude']) ? (double)$_REQUEST['latitude'] : 0;
		$longitude = isset($_REQUEST['longitude']) ? (double)$_REQUEST['longitude'] : 0;
		$altitude = isset($_REQUEST['altitude']) ? (double)$_REQUEST['altitude'] : 0;
		$message = isset($_REQUEST['message']) ? $_REQUEST['message']:0;
		$imei = isset($_REQUEST['imei']) ? $_REQUEST['imei']:0;
	}
	
	/**
	 * 获取当前坐标附近的消息
	 */
	function GetLocalMessage(){
		$latitude = isset($_REQUEST['latitude']) ? (double)$_REQUEST['latitude'] : 0;
		$longitude = isset($_REQUEST['longitude']) ? (double)$_REQUEST['longitude'] : 0;
		$imei = isset($_REQUEST['imei']) ? $_REQUEST['imei']:0;
		$messList = mdl_message_item::getInstance()->GetAppointCoordinateMessage($latitude,$longitude);
		$result = array('state'=>"1",'message'=>$messList);
		output_json($result);
	}
}